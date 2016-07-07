<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

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
        return view('Posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
           'title' => 'required|max:250',
           'author' => 'required|max:20',
           'body' => 'required|max:250',
        ));

        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;

        $post->save();

        return redirect()->action('PageController@getIndex');
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
        if ($post == null)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }

        $comments = Comment::where('post_id', $id)->get();

        return view('Pages.postPage')->withPost($post)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveComment(Request $request)
    {
        $this->validate($request, array(
           'name' => 'required|max:250',
           'text' => 'required',
        ));

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->text = $request->text;
        $comment->post_id = $request->post_id;
        $comment->reply_id = $request->reply_id;

        $comment->save();

        return redirect()->route('posts.show', $comment->post_id);
    }
}
