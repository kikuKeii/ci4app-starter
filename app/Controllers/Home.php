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
		return view('dashboard/home', $data);
	}
	public function profile()
	{
		$data = [
			'title' => 'Dashboard | ci4app-starter',
			'footer' => 'kikuKeii'
		];
		return view('dashboard/profile', $data);
	}
	public function login()
	{
		return view('dashboard/login');
	}
	public function register()
	{
		return view('dashboard/register');
	}

	//--------------------------------------------------------------------

}
