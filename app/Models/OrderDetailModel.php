<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'cake_id', 'quantity', 'price'];
    protected $useTimestamps = false;

    // Optional: Define validation rules for the model
    protected $validationRules = [
        'order_id' => 'required|is_natural_no_zero',
        'cake_id' => 'required|is_natural_no_zero',
        'quantity' => 'required|is_natural_no_zero',
        'price' => 'required|decimal',
    ];

    protected $validationMessages = [
        'order_id' => [
            'required' => 'Order ID is required.',
            'is_natural_no_zero' => 'Order ID must be a positive integer.',
        ],
        'cake_id' => [
            'required' => 'Cake ID is required.',
            'is_natural_no_zero' => 'Cake ID must be a positive integer.',
        ],
        'quantity' => [
            'required' => 'Quantity is required.',
            'is_natural_no_zero' => 'Quantity must be a positive integer.',
        ],
        'price' => [
            'required' => 'Price is required.',
            'decimal' => 'Price must be a valid decimal number.',
        ],
    ];
}
