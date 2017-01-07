<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\User;

use App\Role;

use Hash;

use Auth;

class AdminController extends Controller
{
    public function getIndex()
    {
    	$posts = Post::select('id', 'title', 'author', 'view_count')->get();
    	return view ('Admin.index')->withPosts($posts);
    }

    public function getAuthors()
    {
    	$users = User::all();
    	return view ('Admin.userDashboard')->withUsers($users);
    }

    public function editAuthor($id)
    {
    	$user = User::find($id);
    	return view ('Admin.editAuthor')->withUser($user);
    }

    public function updateAuthor(Request $request, $id)
    {
    	$user = User::find($id);
    	$user->fill($request->all());
    	$user->password = Hash::make(substr($user->last_name, 0, 4) . '1234');
    	$user->save();

    	$user->roles()->detach();

    	if ($request['role_author'])
    	{
    		$user->roles()->attach(Role::where('name', 'Author')->first());
    	}

    	if ($request['role_admin'])
    	{
    		$user->roles()->attach(Role::where('name', 'Admin')->first());
    	}
    	return redirect()->route('admin.getAuthors');
    }

    public function addAuthor(Request $request)
    {
    	return view('Admin.addAuthor');
    }

    public function createAuthor(Request $request)
    {
    	$user = new User();
    	$user->fill($request->all());
    	$user->password = Hash::make(substr($user->last_name, 0, 4) . '1234');
    	$user->save();
    	$user->roles()->attach(Role::where('name', 'Author')->first());
    	return redirect()->route('admin.getAuthors');
    }

    public function deleteAuthor($id)
    {
    	User::destroy($id);
    	return redirect()->route('admin.getAuthors');
    }

    public function getAuthorDashboard()
    {
    	$currentUser = Auth::User();

    	$posts = Post::where('Author', $currentUser->alias)->get();
    	return view ('Author.index')->withPosts($posts);
    }
}
