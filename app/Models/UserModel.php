<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email', 'password', 'first_name', 'last_name',
        'phone', 'address', 'role', 'status'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'email'      => 'required|valid_email|is_unique[users.email]',
        'password'   => 'required|min_length[8]',
        'first_name' => 'required|min_length[2]|max_length[50]',
        'last_name'  => 'required|min_length[2]|max_length[50]',
        'phone'      => 'permit_empty|min_length[10]|max_length[20]',
        'role'       => 'permit_empty|in_list[user,admin]',
        'status'     => 'permit_empty|in_list[active,inactive,blocked]'
    ];

    protected $validationMessages   = [
        'email' => [
            'required' => 'Email є обов\'язковим полем',
            'valid_email' => 'Введіть правильний email',
            'is_unique' => 'Цей email вже зареєстровано'
        ],
        'password' => [
            'required' => 'Пароль є обов\'язковим полем',
            'min_length' => 'Пароль повинен містити мінімум 8 символів'
        ],
        'first_name' => [
            'required' => 'Ім\'я є обов\'язковим полем',
            'min_length' => 'Ім\'я повинно містити мінімум 2 символи'
        ],
        'last_name' => [
            'required' => 'Прізвище є обов\'язковим полем',
            'min_length' => 'Прізвище повинно містити мінімум 2 символи'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
