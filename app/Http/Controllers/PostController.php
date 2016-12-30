<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

use Session;

use Image;

use App\Events\ViewPostEvent;

use Event;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('Posts.index')->withPosts($posts);
    }

    private function getPostByTitle($title)
    {
        $posts = Post::where('title', '=', str_replace("-", " ", $title))->get();

        if (count($posts) != 1)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }
        return $posts[0];
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
        //validate the data
        $this->validate($request, array(
           'title' => 'required|unique:posts|max:250',
           'author' => 'required|max:20',
           'body' => 'required',
           'post_image' => 'required',
           'tags' => 'array'
        ));

        //image processing

        $post_image = $request->file('post_image');
        $filename = time() . '.' . $post_image->getClientOriginalExtension();

        Image::make($post_image)->resize(300, 180)->save(public_path('uploads/'. $filename));

        // create new post object
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->post_image = '/uploads/'. $filename;
        $post->categories = implode(",", array_values($request->tags));

        $post->save();

        Session::flash('success', 'Blog successfully posted');

        //return redirect()->route('posts.show', $post->id);
        return redirect()->action('PageController@getIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = $this->getPostByTitle($id);
        $post->tags = explode(",", $post->categories);

        $viewed = Session::get('viewed', []);
        if (!in_array($post->id, $viewed))
        {
            Event::fire(new ViewPostEvent($post));
            $request->session()->push('viewed', $post->id);
        }

        $comments = Comment::where('post_id', $post->id)->get();

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
        $post = $this->getPostByTitle($id);
        $post->tags = explode(",", $post->categories);

        $comments = Comment::where('post_id', $post->id)->get();

        return view('Posts.editPostPage')->withPost($post)->withComments($comments);
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
        $post = $this->getPostByTitle($id);

        $post->fill($request->all());
        if (isset($request['tags']))
        {
            $post->categories = implode(",", array_values($request->tags));
        }
        $post->save();

        return redirect()->route('posts.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/'); 
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

        return redirect()->route('posts.show', $request->post_title);
    }

    public function deleteComment($id, $title)
    {
        $comment = Comment::find($id);
        if ($comment == null)
        {
            Session::flash('error', 'Comment not found.');
            return redirect('/');
        }
        $comment->delete();
        return redirect()->route('posts.edit', $title);
    }

    public function getPostByTag($tag)
    {
        $posts = Post::where('categories', 'LIKE', '%' . $tag . '%')->orderBy('created_at', 'DESC')->get();
        return view('Posts.index')->withPosts($posts)->withTag($tag);
    }

    public function getPostByAuthor($author)
    {
        $author = str_replace("_", " ", $author);
        $posts = Post::where('author', '=', $author)->orderBy('created_at', 'DESC')->get();
        return view('Posts.index')->withPosts($posts)->withAuthor(' written by '. $author);
    }
}
