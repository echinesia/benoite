<?php

namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $session = session();
        // Check if the user is logged in and not an admin
        if (!$session->get('logged_in') || $session->get('is_admin')) {
            return redirect()->to('/login');
        }

        return view('user/index');
    }

    public function orderHistory()
    {
        $session = session();
        $user_id = $session->get('user_id'); // Get logged-in user ID

        $orderModel = new OrderModel(); // Create an instance of OrderModel

        try {
            // Fetch orders for the logged-in user with specific statuses
            $data['orders'] = $orderModel->where('user_id', $user_id)
                ->whereIn('status', ['Completed', 'Cancelled'])
                ->findAll();
        } catch (\Exception $e) {
            // Handle the exception
            $data['orders'] = [];
            $data['error'] = 'Unable to fetch order history. Please try again later.';
        }

        return view('user/order_history', $data); // Pass data to the view
    }
}
