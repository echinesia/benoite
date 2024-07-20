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
        $userModel = new UserModel();

        // Collect data from the form
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Save the data to the database
        if ($userModel->save($data)) {
            // Log the user in after registration
            $session = session();
            $session->set([
                'username' => $data['username'],
                'logged_in' => true,
            ]);
            return redirect()->to('/user');
        } else {
            // Handle save failure
            $session = session();
            $session->setFlashdata('msg', 'Failed to register user.');
            return redirect()->to('/register');
        }
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
