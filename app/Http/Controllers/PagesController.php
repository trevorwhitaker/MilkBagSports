<?php

namespace App\Http\Controllers;

use Input;

use Mail;

use Session;

use Validator;

class PagesController extends Controller
{
	public function getIndex() 
	{
		return view('Pages.index');
	}
}