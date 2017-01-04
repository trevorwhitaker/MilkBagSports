<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class AdminController extends Controller
{
    public function getIndex()
    {
    	$posts = Post::select('id', 'title', 'author', 'view_count')->get();
    	return view ('Admin.index')->withPosts($posts);
    }
}
