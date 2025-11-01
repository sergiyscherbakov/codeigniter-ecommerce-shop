<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Головна сторінка - каталог товарів
$routes->get('/', 'ProductController::index');

// Аутентифікація
$routes->group('auth', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::attemptRegister');
    $routes->get('logout', 'AuthController::logout');
});

// Товари та каталог
$routes->group('products', function($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('(:num)', 'ProductController::show/$1');
    $routes->get('category/(:num)', 'ProductController::category/$1');
});

// Кошик
$routes->group('cart', function($routes) {
    $routes->get('/', 'CartController::index');
    $routes->post('add/(:num)', 'CartController::add/$1');
    $routes->post('update/(:num)', 'CartController::update/$1');
    $routes->post('remove/(:num)', 'CartController::remove/$1');
    $routes->get('checkout', 'CartController::checkout');
    $routes->post('place-order', 'CartController::placeOrder');
});

// Профіль користувача (потребує авторизації)
$routes->group('profile', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'UserController::profile');
    $routes->post('update', 'UserController::updateProfile');
    $routes->get('orders', 'UserController::orders');
    $routes->get('orders/(:num)', 'UserController::orderDetails/$1');
});

// Адміністративна панель (тільки для адміністраторів)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AdminController::dashboard');

    // Управління користувачами
    $routes->get('users', 'AdminController::users');
    $routes->get('users/(:num)', 'AdminController::userDetails/$1');
    $routes->post('users/(:num)/block', 'AdminController::blockUser/$1');

    // Управління категоріями
    $routes->get('categories', 'AdminController::categories');
    $routes->post('categories', 'AdminController::createCategory');
    $routes->post('categories/(:num)', 'AdminController::updateCategory/$1');

    // Управління товарами
    $routes->get('products', 'AdminController::products');
    $routes->get('products/add', 'AdminController::addProduct');
    $routes->post('products', 'AdminController::createProduct');
    $routes->get('products/(:num)', 'AdminController::editProduct/$1');
    $routes->post('products/(:num)', 'AdminController::updateProduct/$1');

    // Управління замовленнями
    $routes->get('orders', 'AdminController::orders');
    $routes->get('orders/(:num)', 'AdminController::orderDetails/$1');
    $routes->post('orders/(:num)/status', 'AdminController::updateOrderStatus/$1');
});
