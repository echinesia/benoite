<?php

namespace App\Controllers;

use App\Models\CakeModel;

class CartController extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('cart/index', ['cart' => $cart]);
    }

    public function add($id)
    {
        $cakeModel = new CakeModel();
        $cake = $cakeModel->find($id);

        if ($cake) {
            $cart = session()->get('cart') ?? [];
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'id' => $cake['id'],
                    'name' => $cake['name'],
                    'price' => $cake['price'],
                    'image' => $cake['image_url'],
                    'quantity' => 1
                ];
            }
            session()->set('cart', $cart);
        }
        return redirect()->to('/cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->set('cart', $cart);
        }
        return redirect()->to('/cart');
    }

    public function update()
    {
        $cart = session()->get('cart') ?? [];
        foreach ($this->request->getPost('quantities') as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        session()->set('cart', $cart);
        return redirect()->to('/cart');
    }
}
