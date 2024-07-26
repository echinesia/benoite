<?php

namespace App\Controllers;

use App\Models\CakeModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function cake_catalog()
    {
        $cakeModel = new CakeModel();
        $data['cakes'] = $cakeModel->findAll();

        return view('cake_catalog', $data);
    }

    public function contact_us()
    {
        return view('contact_us');
    }

}
