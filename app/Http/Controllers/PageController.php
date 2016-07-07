<?php

namespace App\Http\Controllers;

use Input;

use Mail;

use Session;

use Validator;

use App\Post;

class PageController extends Controller
{
	public function getIndex() 
	{
		$posts = Post::orderBy('id', 'desc')->limit(3)->get();
		
		return view('Pages.index')->withPosts($posts);
	}
}