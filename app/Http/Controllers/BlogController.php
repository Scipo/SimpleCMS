<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug){
        //fetch from the DB based on slug
        $post = Post::where('slug','=', $slug)->first();
        //return the result
        return view('blog.single')->withPost($post);
    }
}
