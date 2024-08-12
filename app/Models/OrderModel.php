<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_name', 'address', 'phone_number', 'delivery_option', 'total', 'status']; // Include user_id if necessary

    // Method to get orders by user ID
    public function getOrdersByUserId($user_id)
    {
        // Adding a where clause to filter orders by user_id
        return $this->where('user_id', $user_id)->findAll(); // Using findAll() to get all records that match the where clause
    }

    // General method to get orders by status
    public function getOrdersByStatus(array $statuses)
    {
        return $this->whereIn('status', $statuses)->findAll();
    }
}
