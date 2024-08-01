<?php

namespace App\Controllers;

use App\Models\Order_Model;
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
        $user_id = session()->get('user_id'); // Get logged-in user ID

        $orderModel = new Order_Model(); // Create an instance of OrderModel

        try {
            $data['orders'] = $orderModel->getOrdersByUserId($user_id); // Fetch orders
        } catch (\Exception $e) {
            // Handle the exception
        }

        return view('user/order_history', $data); // Pass data to the view
    }
}
