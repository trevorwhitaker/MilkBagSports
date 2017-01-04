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

use Auth;

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
        $title = urldecode($title);

        return Post::where('title', '=', $title)->get();
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
        $post->author = Auth::user()->alias;
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
        $posts = $this->getPostByTitle($id);
        if (count($posts) != 1)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }
        $post = $posts[0];
        $post->tags = explode(",", $post->categories);

        $viewed = Session::get('viewed', []);
        if (!in_array($post->id, $viewed))
        {
            Event::fire(new ViewPostEvent($post));
            $request->session()->push('viewed', $post->id);
        }

        return view('Pages.postPage')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = $this->getPostByTitle($id);
        if (count($posts) != 1)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }
        $post = $posts[0];

        if (Auth::user()->alias != $post->author and !Auth::user()->hasRole('Admin'))
        {
            Session::flash('error', 'You can only edit your own posts.');
            return redirect()->back();
        }

        $post->tags = explode(",", $post->categories);

        return view('Posts.editPostPage')->withPost($post);
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
        $posts = $this->getPostByTitle($id);
        if (count($posts) != 1)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }
        $post = $posts[0];

        if (Auth::user()->alias != $post->author and !Auth::user()->hasRole('Admin'))
        {
            Session::flash('error', 'You can only edit your own posts.');
            return redirect()->back();
        }

        $post->fill($request->all());
        if (isset($request['tags']))
        {
            $post->categories = implode(",", array_values($request->tags));
        }
        $post->save();

        return redirect()->route('posts.show', urlencode($id));

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
        if ($post == null)
        {
            Session::flash('error', 'No such post exists.');
            return redirect('/');
        }

        if (Auth::user()->alias != $post->author and !Auth::user()->hasRole('Admin'))
        {
            Session::flash('error', 'You can only edit your own posts.');
            return redirect()->back();
        }

        return redirect('/'); 
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
