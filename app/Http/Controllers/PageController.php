<?php

namespace App\Http\Controllers;
use Mail;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index(){

        //$post = Post::orderBy('created_at', 'desc')->limit(15)->get();
        //return view('pages.index')->withPost($post);
        $search = \Request::get('search');
        $post = Post::where('headline', 'like','%' .$search .'%')->orderBy('created_at', 'desc')->paginate(7);
        return view('pages.index')->withPost($post);
    }

    //SendMail
    public function getContact(){
        $about_title = 'Contact';
        return view('pages.contact')->with('title',$about_title);
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'required|min:2',
            'message'=>'required|min:5',]);

        $data= array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        );

        Mail::send('emails.contact', $data, function ($message) use($data){
            $message->from($data['email']);
            $message->to('');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your message was sent');

        return redirect('contact');
    }

    public function blog(){
        $blog_title = 'Blog';
        return view('pages.blog')->with('title',$blog_title);
    }
}
