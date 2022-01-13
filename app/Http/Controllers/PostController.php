<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $datos['posts']=Post::all();
        return view('posts.articles', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.crear');
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
            'user'=>'required',
            'title'=>'required',
            'content'=>'required',
            'status'=>'required',
            'parent'=>'required',
            'type'=>'required',
        ]);
        $datos['posts'] = Post::create([
            'user'=>$request->user,
            'title'=>$request->title,
            'content'=>$request->content,
            'status'=>$request->status,
            'parent'=>$request->parent,
            'type'=>$request->type,
        ]);

        return \redirect()->route('posts.show', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $datos['posts']=$post;
        return \view('posts.article', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $datos['posts']=$post;
        return \view('posts.editar', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->user=$request->user;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->status=$request->status;
        $post->parent=$request->parent;
        $post->type=$request->type;

        $post->save();

        $datos['posts']=$post;
        return \redirect()->route('posts.show', $datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function contact()
    {
        return view('public.contact');
    }
}
