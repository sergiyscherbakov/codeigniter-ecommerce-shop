<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    public function index()
    {
        // Тестові дані поки немає БД
        $products = [
            [
                'id' => 1,
                'name' => 'Ноутбук ASUS',
                'description' => 'Потужний ноутбук для роботи та ігор з процесором Intel Core i7',
                'price' => 25000.00,
                'quantity' => 5,
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Смартфон Samsung Galaxy',
                'description' => 'Сучасний смартфон з відмінною камерою та батареєю',
                'price' => 15000.00,
                'quantity' => 10,
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Навушники Sony',
                'description' => 'Бездротові навушники з шумопоглинанням',
                'price' => 3500.00,
                'quantity' => 0,
                'status' => 'active'
            ]
        ];

        $categories = [
            ['id' => 1, 'name' => 'Ноутбуки', 'status' => 'active'],
            ['id' => 2, 'name' => 'Смартфони', 'status' => 'active'],
            ['id' => 3, 'name' => 'Аксесуари', 'status' => 'active']
        ];

        $data = [
            'title' => 'Каталог товарів',
            'products' => $products,
            'categories' => $categories
        ];

        return view('products/index', $data);
    }

    public function show($id)
    {
        // Тестові дані
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Ноутбук ASUS',
                'description' => 'Потужний ноутбук для роботи та ігор з процесором Intel Core i7, 16GB RAM, SSD 512GB',
                'price' => 25000.00,
                'quantity' => 5,
                'status' => 'active'
            ],
            2 => [
                'id' => 2,
                'name' => 'Смартфон Samsung Galaxy',
                'description' => 'Сучасний смартфон з відмінною камерою та батареєю. 6.1" дисплей, 128GB пам\'яті',
                'price' => 15000.00,
                'quantity' => 10,
                'status' => 'active'
            ],
            3 => [
                'id' => 3,
                'name' => 'Навушники Sony',
                'description' => 'Бездротові навушники з шумопоглинанням та високою якістю звуку',
                'price' => 3500.00,
                'quantity' => 0,
                'status' => 'active'
            ]
        ];

        if (!isset($products[$id])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Товар не знайдено');
        }

        $product = $products[$id];

        $data = [
            'title' => $product['name'],
            'product' => $product
        ];

        return view('products/show', $data);
    }

    public function category($categoryId)
    {
        // Тестові дані
        $categories = [
            1 => ['id' => 1, 'name' => 'Ноутбуки', 'status' => 'active'],
            2 => ['id' => 2, 'name' => 'Смартфони', 'status' => 'active'],
            3 => ['id' => 3, 'name' => 'Аксесуари', 'status' => 'active']
        ];

        $allProducts = [
            [
                'id' => 1,
                'name' => 'Ноутбук ASUS',
                'description' => 'Потужний ноутбук для роботи та ігор з процесором Intel Core i7',
                'price' => 25000.00,
                'quantity' => 5,
                'category_id' => 1,
                'status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Смартфон Samsung Galaxy',
                'description' => 'Сучасний смартфон з відмінною камерою та батареєю',
                'price' => 15000.00,
                'quantity' => 10,
                'category_id' => 2,
                'status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Навушники Sony',
                'description' => 'Бездротові навушники з шумопоглинанням',
                'price' => 3500.00,
                'quantity' => 0,
                'category_id' => 3,
                'status' => 'active'
            ]
        ];

        if (!isset($categories[$categoryId])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Категорію не знайдено');
        }

        $category = $categories[$categoryId];

        // Фільтруємо товари за категорією
        $categoryProducts = array_filter($allProducts, function($product) use ($categoryId) {
            return $product['category_id'] == $categoryId && $product['status'] === 'active';
        });

        $data = [
            'title' => $category['name'],
            'category' => $category,
            'products' => array_values($categoryProducts),
            'categories' => array_values($categories)
        ];

        return view('products/index', $data); // Використовуємо той же шаблон
    }
}
