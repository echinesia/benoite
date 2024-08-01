<?php

namespace App\Controllers;

use App\Models\CakeModel;

class CheckoutController extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout/index', ['cart' => $cart, 'total' => $total]);
    }

    public function complete()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/');
        }

        $orderData = [
            'customer_name' => $this->request->getPost('customer_name'),
            'address' => $this->request->getPost('address'),
            'total' => $this->request->getPost('total'),
            'status' => 'Pending'
        ];

        // Save order to database (this example assumes an OrderModel exists)
        $orderModel = new \App\Models\OrderModel();
        $orderId = $orderModel->insert($orderData);

        // Save order details
        foreach ($cart as $item) {
            $orderDetail = [
                'order_id' => $orderId,
                'cake_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
            // Save order detail to database (this example assumes an OrderDetailModel exists)
            $orderDetailModel = new \App\Models\OrderDetailModel();
            $orderDetailModel->insert($orderDetail);
        }

        // Clear cart
        session()->remove('cart');

        return redirect()->to('/')->with('message', 'Order placed successfully!');
    }
}
