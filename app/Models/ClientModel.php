<?php

namespace App\Models;
use App\Entities\Client;

class ClientModel extends MyBaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Client::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'name',
        'email',
        'phone',
        'address',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero',
        'name' => 'required|max_length[69]|is_unique[clients.name,id,{id}]',
        'phone' => 'required|exact_length[14]|is_unique[clients.phone,id,{id}]',
        'email' => 'required|valid_email|max_length[99]|is_unique[clients.email,id,{id}]',
        'address' => 'required|max_length[128]',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Obrigatório',
            'max_length' => 'Máximo 69 caracteres',
            'is_unique' => 'Já existe',
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['escapeCustomData'];
    protected $beforeUpdate = ['escapeCustomData'];

}
    