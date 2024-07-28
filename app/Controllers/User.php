<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('is_admin')) {
            return redirect()->to('/login');
        }

        return view('user/index');
    }
}
