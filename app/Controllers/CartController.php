<?php
// CartController.php
namespace App\Controllers;

use App\Models\CartModel;
use App\Models\CakeModel;

class CartController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            session()->setFlashdata('message', 'Please login to add items to your cart.');
            return redirect()->to('login');
        }

        $cartModel = new CartModel();
        $cakeModel = new CakeModel();

        $cartItems = $cartModel->getCartItems($userId);

        foreach ($cartItems as &$item) {
            $cake = $cakeModel->find($item['cake_id']);
            $item['name'] = $cake['name'];
            $item['description'] = $cake['description'];
            $item['price'] = $cake['price'];
            $item['image_url'] = $cake['image_url'];
            $item['total'] = $item['quantity'] * $item['price'];
        }

        return view('cart_view', ['cartItems' => $cartItems]);
    }

    public function update($cartItemId)
    {
        $quantity = $this->request->getPost('quantity');
        $cartModel = new CartModel();
        $cartModel->update($cartItemId, ['quantity' => $quantity]);

        return redirect()->to('cart');
    }

    public function remove($cartItemId)
    {
        $cartModel = new CartModel();
        $cartModel->delete($cartItemId);

        return redirect()->to('cart');
    }
}
