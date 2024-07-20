<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function cake_catalog()
    {
        return view('cake_catalog');
    }

    public function contact_us()
    {
        return view('contact_us');
    }
}
