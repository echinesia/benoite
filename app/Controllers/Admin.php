<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        return view('admin/index');
    }
}
