<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
// validación de formulario
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['posts']=Post::orderBy('id', 'desc')
        ->where('status', '=', 'assigned')
        ->get();
        // dd($datos);
        // where('status',  'assigned')
        //
        return view('posts.articles', \compact('datos'));
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
    public function store(PostRequest $request)
    {
        // otra forma
        // $request->user=\random_int(2, 48);
        // $request->slug=Str::slug($request->title);
        // $request->status=\random_int(1, 5);
        // return $request->all();
        // $post= Post::create($request->all());

        // otra forma
        $post= Post::create([
            'user'=>\random_int(2, 48) ,
            'title'=>$request->title ,
            'slug'=>Str::slug($request->title) ,
            'content'=>$request->content ,
            'status'=>\random_int(1, 5) ,
        ]);

        // otra forma
        // $post=new Post();

        // $post->user=\random_int(2, 48);
        // $post->title=$request->title;
        // $post->slug=Str::slug($request->title);
        // $post->content=$request->content;
        // $post->status=\random_int(1, 5);

        // $post->save();


        return \redirect()->route('posts.index');
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
        return \view('posts.article', compact('datos'));
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
        return \view('posts.editar', compact('datos'));
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
        $request->validate([
            // 'user'=>'required',
            'title'=>'required',
            'content'=>'required',
            // 'status'=>'required',
            // 'parent'=>'required',
            // 'type'=>'required',
        ]);

        $post->user=$request->user;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->status=$request->status;
        $post->parent=$request->parent;
        $post->type=$request->type;

        $post->save();

        $datos['posts']=$post;
        return \redirect()->route('posts.show', compact('datos'));
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
}
