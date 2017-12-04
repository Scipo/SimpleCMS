<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        //$post = Post::orderBy('created_at', 'desc')->limit(15)->get();
        //return view('pages.index')->withPost($post);
        $search = \Request::get('search');
        $post = Post::where('headline', 'like','%' .$search .'%')->orderBy('created_at', 'desc')->paginate(7);
        return view('pages.index')->withPost($post);
    }

    public function about(){
        $about_title = 'Contact';
        return view('pages.contact')->with('title',$about_title);
    }
    public function blog(){
        $blog_title = 'Blog';
        return view('pages.blog')->with('title',$blog_title);
    }
}
