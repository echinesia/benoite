<?php

namespace App\Controllers;

use App\Models\CakeModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use CodeIgniter\Controller;

class CheckoutController extends BaseController
{
    public function index()
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $username = $session->get('username');
        return view('checkout/index', ['cart' => $cart, 'total' => $total, 'username' => $username]);
    }

    public function complete()
    {
        $session = session();

        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/');
        }

        $this->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|min_length[10]|max_length[20]',
            'delivery_option' => 'required'
        ]);


        $phoneNumber = $this->request->getPost('phone_number');
        $deliveryOption = $this->request->getPost('delivery_option');
        $total = $this->request->getPost('total');

        $orderData = [
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number'),
            'delivery_option' => $this->request->getPost('delivery_option'),
            'total' => $this->request->getPost('total'),
            'status' => 'Pending',
            'user_id' => session()->get('user_id') // Ensure user_id is set
        ];



        $orderModel = new OrderModel();

        try {
            $orderId = $orderModel->insert($orderData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unable to place order. Please try again.');
        }

        $orderDetailModel = new OrderDetailModel();

        foreach ($cart as $item) {
            $orderDetail = [
                'order_id' => $orderId,
                'cake_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];

            try {
                $orderDetailModel->insert($orderDetail);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Unable to place order details. Please try again.');
            }
        }

        // Clear cart
        session()->remove('cart');

        return redirect()->to('/checkout/complete_purchase/' . $orderId);
    }

    public function completePurchase($orderId)
    {
        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();
        $cakeModel = new CakeModel(); // Add this line to access cake data

        // Get order details
        $order = $orderModel->find($orderId);
        $orderDetails = $orderDetailModel->where('order_id', $orderId)->findAll();

        if (!$order) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order not found');
        }

        // Fetch cake details including image URL
        foreach ($orderDetails as &$detail) {
            $cake = $cakeModel->find($detail['cake_id']);
            $detail['cake_name'] = $cake['name'];
            $detail['cake_image'] = $cake['image_url'];
        }
        // Pass order details to the view
        return view('checkout/complete_purchase', [
            'order' => $order,
            'orderDetails' => $orderDetails
        ]);
    }
}
