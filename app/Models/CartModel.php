<?php
// CartModel.php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'cake_id', 'quantity'];

    public function getCartItems($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}
