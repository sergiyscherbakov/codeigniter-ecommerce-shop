<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function __construct()
    {
        // Всі методи цього контролера потребують авторизації
        if (!session()->get('is_logged_in')) {
            redirect()->to('/auth/login')->send();
            exit;
        }
    }

    public function profile()
    {
        $data = [
            'title' => 'Мій профіль',
            'user' => [
                'id' => session()->get('user_id'),
                'email' => session()->get('user_email'),
                'first_name' => explode(' ', session()->get('user_name'))[0] ?? '',
                'last_name' => explode(' ', session()->get('user_name'))[1] ?? '',
                'role' => session()->get('user_role')
            ]
        ];

        return view('profile/index', $data);
    }

    public function updateProfile()
    {
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name'  => 'required|min_length[2]|max_length[50]',
            'phone'      => 'permit_empty|min_length[10]|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('profile/index', [
                'title' => 'Мій профіль',
                'validation' => $this->validator,
                'user' => [
                    'id' => session()->get('user_id'),
                    'email' => session()->get('user_email'),
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name' => $this->request->getPost('last_name'),
                    'role' => session()->get('user_role')
                ]
            ]);
        }

        // Тут буде код оновлення в БД
        // Поки тільки оновлюємо сесію
        $newName = $this->request->getPost('first_name') . ' ' . $this->request->getPost('last_name');
        session()->set('user_name', $newName);

        session()->setFlashdata('success', 'Профіль успішно оновлено');
        return redirect()->to('/profile');
    }

    public function orders()
    {
        // Тестові дані замовлень
        $orders = [
            [
                'id' => 1001,
                'date' => '2025-09-15',
                'status' => 'delivered',
                'total' => 28500.00,
                'items_count' => 2
            ],
            [
                'id' => 1002,
                'date' => '2025-09-10',
                'status' => 'shipped',
                'total' => 15000.00,
                'items_count' => 1
            ],
            [
                'id' => 1003,
                'date' => '2025-09-05',
                'status' => 'confirmed',
                'total' => 3500.00,
                'items_count' => 1
            ]
        ];

        $data = [
            'title' => 'Мої замовлення',
            'orders' => $orders
        ];

        return view('profile/orders', $data);
    }

    public function orderDetails($orderId)
    {
        // Тестові дані детального замовлення
        $orderDetails = [
            1001 => [
                'id' => 1001,
                'date' => '2025-09-15',
                'status' => 'delivered',
                'total' => 28500.00,
                'shipping_method' => 'courier',
                'payment_method' => 'cash',
                'shipping_address' => 'м. Київ, вул. Хрещатик, 22, кв. 15',
                'items' => [
                    [
                        'name' => 'Ноутбук ASUS',
                        'price' => 25000.00,
                        'quantity' => 1,
                        'subtotal' => 25000.00
                    ],
                    [
                        'name' => 'Навушники Sony',
                        'price' => 3500.00,
                        'quantity' => 1,
                        'subtotal' => 3500.00
                    ]
                ]
            ],
            1002 => [
                'id' => 1002,
                'date' => '2025-09-10',
                'status' => 'shipped',
                'total' => 15000.00,
                'shipping_method' => 'post',
                'payment_method' => 'card',
                'shipping_address' => 'Відділення Нової Пошти №5, м. Львів',
                'items' => [
                    [
                        'name' => 'Смартфон Samsung Galaxy',
                        'price' => 15000.00,
                        'quantity' => 1,
                        'subtotal' => 15000.00
                    ]
                ]
            ]
        ];

        if (!isset($orderDetails[$orderId])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Замовлення не знайдено');
        }

        $data = [
            'title' => 'Замовлення #' . $orderId,
            'order' => $orderDetails[$orderId]
        ];

        return view('profile/order_details', $data);
    }
}
