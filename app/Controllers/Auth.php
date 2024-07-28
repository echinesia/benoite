<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        helper(['form', 'url']);
        $session = session();
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'is_admin' => $this->request->getVar('is_admin') ? 1 : 0,
        ];

        if ($userModel->save($data)) {
            $session->set([
                'username' => $data['username'],
                'is_admin' => $data['is_admin'],
                'logged_in' => true,
            ]);
            return redirect()->to('/user');
        } else {
            $errors = $userModel->errors();
            var_dump($errors); // Debugging line
            $session->setFlashdata('msg', 'Registration failed. Please try again.');
            return redirect()->to('/register');
        }
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            $pass = $user['password'];
            $auth = password_verify($password, $pass);
            if ($auth) {
                $session->set([
                    'username' => $user['username'],
                    'is_admin' => $user['is_admin'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/user');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not found.');
            return redirect()->to('/login');
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
