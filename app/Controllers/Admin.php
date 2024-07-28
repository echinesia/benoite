<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        //echo "<pre>";
        //print_r($session->get());
        //echo "</pre>";

        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        return view('admin/index');
    }
}
