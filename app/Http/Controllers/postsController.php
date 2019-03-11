<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use Auth;
use App\Tag;
use App\Post;
use App\User;
class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_admin()
    {
        return view('admin.index')->with('users_first_4', User::OrderBy('created_at', 'desc')->get()->take(4))
                                  ->with('count_users', User::all()->count())
                                  ->with('count_category', Category::all()->count())
                                  ->with('count_tag', Tag::all()->count())
                                  ->with('count_post', Post::all()->count());
    }
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0 || $tags->count() == 0){
        Session::flash('success','you must create category or tag first');
        return redirect()->back();
        }
        return view('admin.posts.create')->with('categories' , $categories)
                                         ->with('tags' , $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'image' => 'required|image',
        'category_id' => 'required',
        'tags'  => 'required',
        'content' => 'required'
    ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/image/', $image_new_name);

         $post = Post::create([
            'title' => $request->title,
            'image' => 'uploads/image/' .$image_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'slug'  => str_slug($request->title)
         ]);

        $post->tags()->attach($request->tags);

         $post->save();

         Session::flash('success', 'post crueted successfully.');
         return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.posts.edit')->with('post', Post::find($id))
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
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
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required',
        'tags'  => 'required',
        'content' => 'required'
    ]);

        $post = Post::find($id);

        if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/image', $image_new_name);
        $post->image = 'uploads/image' .$image_new_name;
        }

            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->user_id = $request->user_id;

        $post->save();
         $post->tags()->sync($request->tags);
         Session::flash('success', 'post updated successfully.');
         return redirect()->route('posts.index');

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
        $post->delete();

        Session::flash('success', "Post Deleted successfully.");
        return redirect()->back();
    }
}
