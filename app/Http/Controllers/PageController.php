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
	{	//need to change this to a maybe weekly limit instead
		$posts = Post::orderBy('id', 'desc')->limit(10)->get();

		$top_posts = Post::orderBy('view_count', 'desc')->limit(3)->get();
		
		return view('Pages.index')->withPosts($posts)->withTop_posts($top_posts);
	}

	public function getAboutUs() 
	{	//need to change this to a maybe weekly limit instead
		return view('Pages.aboutUs');
	}
}