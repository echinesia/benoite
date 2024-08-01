<?php

namespace App\Controllers;

use App\Models\OrderModel;
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

    public function orderHistory()
    {
        $userId = session()->get('user_id'); // Fetch user ID from session
        $model = new OrderModel(); // Create an instance of OrderModel
        $orders = $model->where('user_id', $userId)->findAll(); // Fetch orders for the user

        echo view('order_history', ['orders' => $orders]); // Pass orders to view
    }
}
