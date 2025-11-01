<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('user_role') !== 'admin') {
            session()->setFlashdata('error', 'Доступ заборонено. Тільки для адміністраторів.');
            return redirect()->to('/')->send();
        }
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Панель адміністратора',
            'stats' => [
                'users' => 2,
                'orders' => 3,
                'products' => 3,
                'revenue' => 15000
            ]
        ];

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $data = [
            'title' => 'Управління користувачами'
        ];

        return view('admin/users', $data);
    }

    public function products()
    {
        $data = [
            'title' => 'Управління товарами'
        ];

        return view('admin/products', $data);
    }

    public function orders()
    {
        $data = [
            'title' => 'Управління замовленнями'
        ];

        return view('admin/orders', $data);
    }
}
