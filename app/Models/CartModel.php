<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $allowedFields = ['user_id', 'cake_id', 'quantity', 'notes'];

    public function getCartItems($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function updateCartItem($cartItemId, $data)
    {
        return $this->update($cartItemId, $data);
    }

    public function removeCartItem($cartItemId)
    {
        return $this->delete($cartItemId);
    }
}
