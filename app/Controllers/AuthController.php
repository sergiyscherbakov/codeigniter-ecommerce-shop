<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/');
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Тестові користувачі + зареєстровані через форму
        $testUsers = session()->get('test_users') ?? [];

        // Додаємо тестового адміністратора
        $defaultUsers = [
            [
                'id' => 999,
                'email' => 'admin@test.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'first_name' => 'Адмін',
                'last_name' => 'Тестовий',
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'id' => 998,
                'email' => 'user@test.com',
                'password' => password_hash('user1234', PASSWORD_DEFAULT),
                'first_name' => 'Юзер',
                'last_name' => 'Тестовий',
                'role' => 'user',
                'status' => 'active'
            ]
        ];

        $allUsers = array_merge($defaultUsers, $testUsers);
        $user = null;

        // Шукаємо користувача за email
        foreach ($allUsers as $u) {
            if ($u['email'] === $email) {
                $user = $u;
                break;
            }
        }

        if (!$user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Неправильний email або пароль');
            return redirect()->back();
        }

        if ($user['status'] !== 'active') {
            session()->setFlashdata('error', 'Ваш акаунт заблокований');
            return redirect()->back();
        }

        session()->set([
            'user_id' => $user['id'],
            'user_email' => $user['email'],
            'user_role' => $user['role'],
            'user_name' => $user['first_name'] . ' ' . $user['last_name'],
            'is_logged_in' => true
        ]);

        return redirect()->to('/');
    }

    public function register()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/');
        }

        return view('auth/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'email'              => 'required|valid_email',
            'password'           => 'required|min_length[8]',
            'password_confirm'   => 'required|matches[password]',
            'first_name'         => 'required|min_length[2]|max_length[50]',
            'last_name'          => 'required|min_length[2]|max_length[50]',
            'phone'              => 'permit_empty|min_length[10]|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }

        // Тестовий режим - просто перевіряємо чи не зареєстровано цей email
        $email = $this->request->getPost('email');
        $testUsers = session()->get('test_users') ?? [];

        // Перевіряємо унікальність email вручну
        foreach ($testUsers as $user) {
            if ($user['email'] === $email) {
                session()->setFlashdata('error', 'Користувач з цим email вже зареєстрований');
                return redirect()->back();
            }
        }

        // Створюємо нового користувача
        $userData = [
            'id'         => count($testUsers) + 1,
            'email'      => $email,
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'phone'      => $this->request->getPost('phone'),
            'address'    => $this->request->getPost('address'),
            'role'       => 'user',
            'status'     => 'active'
        ];

        // Зберігаємо в сесії як тестові дані
        $testUsers[] = $userData;
        session()->set('test_users', $testUsers);

        session()->setFlashdata('success', 'Реєстрація успішна! Тепер ви можете увійти');
        return redirect()->to('/auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
