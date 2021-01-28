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

    public function create()
    {
        session();
        $data = [
            'title' => 'Dashboard | ci4app-starter',
            'footer' => 'kikuKeii',
            'validation' => \Config\Services::validation()
        ];

        return view('users/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[users.name]',
                'errors' => [
                    'required' => '{field} user harus diisi.',
                    'is_unique' => '{field} user sudah terdaftar.'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user harus diisi.'
                ]
            ],
            'office' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user harus diisi.'
                ]
            ],
            'age' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user harus diisi.'
                ]
            ],
            'salary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} user harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->usersModel->save([
            'name' => $this->request->getVar('name'),
            'sulg' => $slug,
            'position' => $this->request->getVar('position'),
            'office' => $this->request->getVar('office'),
            'age' => $this->request->getVar('age'),
            'salary' => $this->request->getVar('salary')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diSubmit');
        return redirect()->to('/users');
    }

    //------------------
}
