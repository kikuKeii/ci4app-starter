<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        // $user = $this->usersModel->findAll();
        $data = [
            'title' => 'User',
            'footer' => 'kikuKeii',
            'user' => $this->usersModel->getUsers()
        ];
        // dd($user);
        return view('users/table', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail User',
            'footer' => 'kikuKeii',
            'user' => $this->usersModel->getUsers($slug)
        ];
        return view('users/detail', $data);
    }

    public function formInput()
    {
        $data = [
            'title' => 'Dashboard | ci4app-starter',
            'footer' => 'kikuKeii'
        ];

        return view('users/form-input', $data);
    }
    //------------------
}
