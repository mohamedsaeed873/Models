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
     $posts=Post::all();
     return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert new post 1

       // $post= new Post();
      //  $post->title=$request->title;
      //  $post->body=$request->body;
       // $post->save();


        // insert new post 2
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);



        return response('Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        //$post=Post::where('id',$id)->first();
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $post=Post::findorFail($id);
        //$post->title=$request->title;
        //$post->body=$request->body;
        //$post->save();

        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function restore($id){
        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
