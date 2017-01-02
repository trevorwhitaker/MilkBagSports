<?php

namespace App\Http\Controllers;

use Input;

use Mail;

use Session;

use Validator;

use App\Post;

class PageController extends Controller
{

	public function find_week_index($week)

	{
		$curr = date('Y-m-d', time());
		$required_week_end= date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - ($week-1)*7, date("Y")));
		$required_week_start = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - ($week)*7, date("Y")));

		$posts = Post::orderBy('id', 'desc')->whereBetween('created_at', array($required_week_start, $required_week_end))->get();

		$top_posts = Post::orderBy('view_count', 'desc')->limit(3)->get();
		
		return view('Pages.index')->withPosts($posts)->withTop_posts($top_posts)->withWeek($week);

	}

	public function getIndex() 
	{	//need to change this to a maybe weekly limit instead
		$curr = date('Y-m-d', time());
		$tomorrow = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") +1, date("Y")));
		$last_week = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - 7, date("Y")));
		$posts = Post::orderBy('id', 'desc')->whereBetween('created_at', array($last_week, $tomorrow))->get();

		$top_posts = Post::orderBy('view_count', 'desc')->limit(3)->get();
		
		return view('Pages.index')->withPosts($posts)->withTop_posts($top_posts)->withWeek(1);
	}


	public function getAboutUs() 
	{	//need to change this to a maybe weekly limit instead
		return view('Pages.aboutUs');
	}
}