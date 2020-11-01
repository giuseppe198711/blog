<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();

       return view("posts.index", compact("posts"));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //validazione

        $request->validate([
          "title" => "required",
          "slug" => "required|unique:posts",
          "author" => "required|max:100",
          "content" => "required",
        ]);

        $newPost = new Post;

        $newPost->title = $data["title"];
        $newPost->slug = $data["slug"];
        $newPost->author = $data["author"];
        $newPost->content = $data["content"];
        $newPost->image = $data["image"];

        $newPost->save();

        return redirect()->route("posts.show", $newPost);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::find($id);

       return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view("posts.edit", compact("post"));

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
        $data = $request->all();

        $post = Post::find($id);

        //validazione

        $request->validate([
            "title" => "required",
            "slug" => [
                "required",
                Rule::unique('posts')->ignore($post->id),
            ],
            "author" => "required|max:100",
            "content" => "required",
          ]);


        $post->title = $data["title"];
        $post->slug = $data["slug"];
        $post->author = $data["author"];
        $post->content = $data["content"];
        $post->image = $data["image"];

        $post->update();

        return redirect()->route("posts.show", $post);

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

        return redirect()->route("posts.index");
    }
}
