<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //OrderBy('id','desc')
        //$pst = Post::orderBy('id','desc')->paginate(10);
        //return view('post.index')->with('post',$pst);
        $search = \Request::get('search');
        $pst = Post::where('headline', 'like','%' .$search .'%')->orderBy('created_at', 'desc')->paginate(10);
        return view('post.index')->with('post',$pst);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this ->validate($request, [
            'headline' =>'required',
            'slug'=>'required|alpha_dash|unique:posts,slug',
            'category_id'=>'required',
            'description' => 'required',
            'image'=>'sometimes|image',
            'keywords'=>'required',
            'narration'=>'required',
           ]);
        //Create Post
        $post = new Post();
        $post->headline=$request->input('headline');
        $post->slug=$request->input('slug');
        $post->keywords=$request->input('keywords');
        $post->narration=$request->input('narration');
        $post->category_id=$request->input('category_id');
        $post->description=$request->input('description');


        //save image
        If($request->hasFile('image')){
            $image = $request->file('image');
            $filename =time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }

        $post->save();
        //redirect to post page

        //return redirect('/post')->with('success', 'Post was created');
        Session::flash('success',"Post was created");
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pst = Post::find($id);
        //return view('post.show')->with('post',$pst);
        return view('post.show')->withPost($pst);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pst = Post::find($id);
        $categories = Category::all();
        $cats=[];
        foreach ($categories as $item){
            $cats[$item->id]=$item->name;
        }
        return view('post.edit')->with('post',$pst)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =  Post::find($id);
            $this ->validate($request, [
                'headline' =>'required',
                'slug' =>"required|alpha_dash|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'description' => 'required',
                'image'=>'image',
                'keywords'=>'required',
                'narration'=>'required',
            ]);


        //Update Post
        $post =  Post::find($id);
        $post->headline=$request->input('headline');
        $post->slug=$request->input('slug');
        $post->keywords=$request->input('keywords');
        $post->narration=$request->input('narration');
        $post->category_id = $request->input('category_id');
        $post->description=$request->input('description');

        If($request->hasFile('image')){
            //add new image
            $image = $request->file('image');
            $filename =time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldImage=$post->image;
            //Update database
            $post->image = $filename;
            //Delete image
            Storage::delete($oldImage);
        }
        $post->save();

        return redirect(route('post.index'))->with('success', 'Post was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->image);
        $post->delete();

        return redirect(route('post.index'))->with('success', 'Post was Deleted');
    }
}
