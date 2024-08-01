<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function details($orderId)
    {
        $model = new OrderModel();
        $order = $model->find($orderId);

        if (!$order) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Order with ID $orderId not found.");
        }

        echo view('order_details', ['order' => $order]);
    }
}
