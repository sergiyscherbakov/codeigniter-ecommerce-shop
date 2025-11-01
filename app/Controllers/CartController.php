<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CartController extends BaseController
{
    private function getTestProducts()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Ноутбук ASUS',
                'description' => 'Потужний ноутбук для роботи та ігор з процесором Intel Core i7',
                'price' => 25000.00,
                'quantity' => 5,
                'status' => 'active'
            ],
            2 => [
                'id' => 2,
                'name' => 'Смартфон Samsung Galaxy',
                'description' => 'Сучасний смартфон з відмінною камерою та батареєю',
                'price' => 15000.00,
                'quantity' => 10,
                'status' => 'active'
            ],
            3 => [
                'id' => 3,
                'name' => 'Навушники Sony',
                'description' => 'Бездротові навушники з шумопоглинанням',
                'price' => 3500.00,
                'quantity' => 0,
                'status' => 'active'
            ]
        ];
    }

    public function index()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $cart = session()->get('cart') ?? [];
        $products = $this->getTestProducts();
        $cartItems = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            if (isset($products[$productId])) {
                $product = $products[$productId];
                $product['cart_quantity'] = $quantity;
                $product['subtotal'] = $product['price'] * $quantity;
                $cartItems[] = $product;
                $total += $product['subtotal'];
            }
        }

        $data = [
            'title' => 'Кошик',
            'cartItems' => $cartItems,
            'total' => $total
        ];

        return view('cart/index', $data);
    }

    public function add($productId)
    {
        if (!session()->get('is_logged_in')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Необхідно увійти до системи']);
        }

        $products = $this->getTestProducts();

        if (!isset($products[$productId])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Товар не знайдено']);
        }

        $product = $products[$productId];
        if ($product['quantity'] <= 0) {
            return $this->response->setJSON(['success' => false, 'message' => 'Товар відсутній на складі']);
        }

        $cart = session()->get('cart') ?? [];
        $requestQuantity = $this->request->getJSON(true)['quantity'] ?? 1;

        if (isset($cart[$productId])) {
            $cart[$productId] += $requestQuantity;
        } else {
            $cart[$productId] = $requestQuantity;
        }

        // Перевірка чи не перевищуємо кількість на складі
        if ($cart[$productId] > $product['quantity']) {
            $cart[$productId] = $product['quantity'];
        }

        session()->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Товар додано до кошика',
            'cart_count' => array_sum($cart)
        ]);
    }

    public function update($productId)
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $quantity = (int) $this->request->getPost('quantity');
        $cart = session()->get('cart') ?? [];

        if ($quantity > 0) {
            $cart[$productId] = $quantity;
        } else {
            unset($cart[$productId]);
        }

        session()->set('cart', $cart);
        session()->setFlashdata('success', 'Кошик оновлено');

        return redirect()->to('/cart');
    }

    public function remove($productId)
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $cart = session()->get('cart') ?? [];
        unset($cart[$productId]);
        session()->set('cart', $cart);

        session()->setFlashdata('success', 'Товар видалено з кошика');

        return redirect()->to('/cart');
    }

    public function checkout()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            session()->setFlashdata('error', 'Кошик порожній');
            return redirect()->to('/cart');
        }

        $products = $this->getTestProducts();
        $cartItems = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            if (isset($products[$productId])) {
                $product = $products[$productId];
                $product['cart_quantity'] = $quantity;
                $product['subtotal'] = $product['price'] * $quantity;
                $cartItems[] = $product;
                $total += $product['subtotal'];
            }
        }

        $data = [
            'title' => 'Оформлення замовлення',
            'cartItems' => $cartItems,
            'total' => $total
        ];

        return view('cart/checkout', $data);
    }

    public function placeOrder()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            session()->setFlashdata('error', 'Кошик порожній');
            return redirect()->to('/cart');
        }

        // Тут буде логіка збереження замовлення в БД
        // Поки просто очищаємо кошик
        session()->remove('cart');
        session()->setFlashdata('success', 'Замовлення успішно оформлено! Номер замовлення: #' . rand(1000, 9999));

        return redirect()->to('/profile/orders');
    }
}
