<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'customer_name', 'address', 'total', 'status']; // Include user_id if necessary
}
