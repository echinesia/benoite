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

    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function order_status()
    {
        $session = session();

        // Check if the user is logged in and is not an admin
        if (!$session->get('logged_in') || $session->get('is_admin')) {
            return redirect()->to('/login');
        }

        // Fetch orders based on their status using the new method
        $data = [
            'pendingProcessingOrders' => $this->orderModel->getOrdersByStatus(['Pending', 'Processing']),
            'completedOrders' => $this->orderModel->getOrdersByStatus(['Completed']),
            'canceledOrders' => $this->orderModel->getOrdersByStatus(['Canceled']),
        ];

        return view('user/order_status', $data);
    }
}
