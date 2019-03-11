<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use Auth;
use App\Tag;
use App\Post;
use App\User;
use App\Setting;
class FrontController extends Controller
{
    public function index()
    {
       return view('welcome')->with('title', Setting::first()->site_name)
                             ->with('categories', Category::take(5)->get())
                             ->with('first_post', Post::all()->first())
                             ->with('second_post', Post::skip(1)->take(1)->get()->first())
                             ->with('third_post', Post::skip(2)->take(1)->get()->first())
                             ->with('setting', Setting::first())
                             ->with('news', Category::where(['name' => 'NEWS'])->get()->first())
                             ->with('video', Category::where(['name' => 'VIDEOS'])->get()->first())
                             ->with('discuss', Category::where(['name' => 'DISCUSSIONS'])->get()->first());
    }


    public function category($id)
    {
    	return view('category')->with('category', Category::find($id))
    	                       ->with('title', Setting::first()->site_name)
                               ->with('categories', Category::take(5)->get())
                               ->with('tags', Tag::all());
    }

    public function tag($id)
    {
    	return view('tag')->with('tag', Tag::find($id))
    	                       ->with('title', Setting::first()->site_name)
                               ->with('categories', Category::take(5)->get())
                               ->with('tags', Tag::all());
    }


    public function post($id)
    { 
    	$post = Post::find($id);
    	$next = Post::where('id', '>', $post->id)->min('id');
        $prev = Post::where('id', '<', $post->id)->max('id');
    	return view('post')->with('post', $post)
    	                       ->with('title', Setting::first()->site_name)
                               ->with('categories', Category::take(5)->get())
                               ->with('next', Post::find($next))
                               ->with('prev', Post::find($prev))
                               ->with('tags', Tag::all());
    }
}
