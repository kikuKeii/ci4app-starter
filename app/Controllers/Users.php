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
        return view('dashboard/table', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail User',
            'footer' => 'kikuKeii',
            'user' => $this->usersModel->getUsers($slug)
        ];
        return view('dashboard/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Dashboard | ci4app-starter',
            'footer' => 'kikuKeii',
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/create', $data);
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
            return redirect()->to('/dashboard/create')->withInput()->with('validation', $validation);
        }

        // $slug = url_title($this->request->getVar('name'), '-', TRUE);
        $this->usersModel->save([
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
            'position' => $this->request->getPost('position'),
            'office' => $this->request->getPost('office'),
            'age' => $this->request->getPost('age'),
            'salary' => $this->request->getPost('salary'),
            'img' => $this->request->getPost('img')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diSubmit');

        return redirect()->to('/dashboard/users');
        // dd($this->request->getVar(), 'slug');
    }
    public function delete($id)
    {
        $this->usersModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/dashboard/users');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Dashboard | ci4app-starter',
            'footer' => 'kikuKeii',
            'validation' => \Config\Services::validation(),
            'user' => $this->usersModel->getUsers($slug)
        ];

        return view('dashboard/edit', $data);
    }

    public function update($id)
    {
        $olduser = $this->usersModel->getUsers($this->request->getVar('slug'));
        if ($olduser['name'] == $this->request->getVar('name')) {
            $rule = 'request';
        } else {
            $rule = 'required|is_unique[users.name]';
        }

        if (!$this->validate([
            'name' => [
                'rules' => $rule,
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
            return redirect()->to('/dashboard/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $this->usersModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => url_title($this->request->getVar('name'), '-', true),
            'position' => $this->request->getVar('position'),
            'office' => $this->request->getVar('office'),
            'age' => $this->request->getVar('age'),
            'salary' => $this->request->getVar('salary'),
            'img' => $this->request->getVar('img')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di Update');

        return redirect()->to('/dashboard/users');
        // dd($this->request->getVar());
    }
    //------------------
}
