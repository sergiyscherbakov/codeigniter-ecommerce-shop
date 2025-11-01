<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'description', 'price', 'quantity', 'category_id', 'status'
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
        'name'        => 'required|min_length[3]|max_length[200]',
        'price'       => 'required|numeric|greater_than[0]',
        'quantity'    => 'required|integer|greater_than_equal_to[0]',
        'category_id' => 'required|integer',
        'status'      => 'permit_empty|in_list[active,inactive]'
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Назва товару є обов\'язковою',
            'min_length' => 'Назва повинна містити мінімум 3 символи'
        ],
        'price' => [
            'required' => 'Ціна є обов\'язковою',
            'numeric' => 'Ціна повинна бути числом'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
