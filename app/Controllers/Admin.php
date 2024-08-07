<?php

namespace App\Controllers;

use App\Models\CakeModel;
use App\Models\OrderModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        return view('admin/index');
    }

    public function manageOrders()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        $orderModel = new OrderModel();

        try {
            $data['orders'] = $orderModel->where('status', 'Pending')->findAll();
            if (empty($data['orders'])) {
                $data['message'] = 'No pending orders found.';
            }
        } catch (\Exception $e) {
            $data['orders'] = [];
            $data['error'] = 'Unable to fetch orders. Please try again later.';
        }

        return view('admin/manage_orders', $data);
    }

    public function manageCake()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        $cakeModel = new CakeModel();

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $rules = [
                'cake_name' => 'required|string|max_length[255]',
                'cake_description' => 'required|string',
                'price' => 'required|decimal',
                'image_url' => 'uploaded[image_url]|is_image[image_url]|max_size[image_url,1024]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $file = $this->request->getFile('image_url');
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);

                $cakeModel->save([
                    'cake_name' => $this->request->getPost('cake_name'),
                    'cake_description' => $this->request->getPost('cake_description'),
                    'price' => $this->request->getPost('price'),
                    'image_url' => $newName,
                ]);

                return redirect()->to('/admin/manage_cake')->with('success', 'Cake added successfully!');
            }
        }

        // Fetch all cakes for display and editing
        try {
            $data['cakes'] = $cakeModel->findAll();
        } catch (\Exception $e) {
            $data['cakes'] = [];
            $data['error'] = 'Unable to fetch cakes. Please try again later.';
        }

        return view('admin/manage_cake', $data);
    }


    public function editCake()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        $cakeModel = new CakeModel();
        $id = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        // Check if a file was uploaded
        if ($this->request->getFile('image_url')->isValid()) {
            $file = $this->request->getFile('image_url');
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName); // Ensure the directory is correct
            $data['image_url'] = 'uploads/' . $newName; // Save relative path to the database
        }

        try {
            $cakeModel->update($id, $data);
            return redirect()->to('/admin/manage_cake')->with('success', 'Cake updated successfully.');
        } catch (\Exception $e) {
            return redirect()->to('/admin/manage_cake')->with('error', 'Unable to update cake. Please try again later.');
        }
    }

    public function updateCake($id)
    {
        $cakeModel = new CakeModel();
        $data = $this->request->getPost();

        $file = $this->request->getFile('image_url');
        if ($file && $file->isValid()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $data['image_url'] = 'uploads/' . $newName; // Save relative path
        }

        $cakeModel->update($id, $data);
        return redirect()->to('/admin/manage_cake');
    }



    public function deleteCake($id = null)
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        $cakeModel = new CakeModel();

        if ($id) {
            $cakeModel->delete($id);
            return redirect()->to('/admin/manage_cake')->with('success', 'Cake deleted successfully!');
        }

        return redirect()->to('/admin/manage_cake');
    }

    public function updateOrderStatus($id, $status)
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_admin')) {
            return redirect()->to('/login');
        }

        $orderModel = new OrderModel();

        // Update the order status
        try {
            $orderModel->update($id, ['status' => $status]);
            return redirect()->to('/admin/manage_orders')->with('success', 'Order status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->to('/admin/manage_orders')->with('error', 'Unable to update order status. Please try again later.');
        }
    }
}
