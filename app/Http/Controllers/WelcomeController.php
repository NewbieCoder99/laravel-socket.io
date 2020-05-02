<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function hit(Request $request)
	{
		event(new \App\Events\SendMessage($request->message));
		return 1;
	}

	public function form()
	{
		return view('form');
	}
}
