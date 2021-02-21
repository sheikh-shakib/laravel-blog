<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('created_at','DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        $categories=Category::all();
        return view('admin.post.create', compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required|unique:posts',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post=new Post;
        $post->title=$request->title;
        $post->slug=Str::slug($request->title,'-');
        
        $image=$request->image;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/images'), $filename);
        $post->image=$filename;

        $post->image='images/'.$filename;
        $post->description=$request->description;
        $post->category_id=$request->category;
        $post->user_id=auth()->user()->id;
        $post->published_at=Carbon::now();
        $post->save();
        $post->tags()->attach($request->tags);
        if ($post==true) {
            return redirect()->route('post.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tag=Tag::all();
        return view('admin.post.show', compact('post','tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=Tag::all();
        $categories=Category::all();
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post->title=$request->title;
        $post->slug=Str::slug($request->title,'-');
        
        if ($request->hasFile('image')) {
            $image=$request->image;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/images'), $filename);
            $post->image=$filename;
            $post->image='images/'.$filename;
        }

        $post->description=$request->description;
        $post->category_id=$request->category;
        $post->save();
        $post->tags()->sync($request->tags);
        if ($post==true) {
            return redirect()->back()->with('msg','File Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
        $post->delete();
        if ($post==true) {
            return redirect()->route('post.index');
        }
    }
}
