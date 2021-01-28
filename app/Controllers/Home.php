<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Dashboard | ci4app 	-starter',
			'footer' => 'kikuKeii'
		];
		return view('pages/home', $data);
	}
	public function profile()
	{
		$data = [
			'title' => 'Dashboard | ci4app-starter',
			'footer' => 'kikuKeii'
		];
		return view('pages/profile', $data);
	}
	public function login()
	{
		return view('pages/login');
	}
	public function register()
	{
		return view('pages/register');
	}

	//--------------------------------------------------------------------

}
