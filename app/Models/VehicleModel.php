<?php

namespace App\Models;
use App\Entities\Vehicle;

class VehicleModel extends MyBaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'vehicles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Vehicle::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'brand',
        'model',
        'year',
        'license_plate',
        'client_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero',
        'brand' =>'required',
        'model' =>  'required',
        'year' => 'required|exact_length[4]',
        'license_plate' => 'required|exact_length[7]|is_unique[vehicles.license_plate,id,{id}]',
        'client_id' => 'required',
    ];
    protected $validationMessages = [
        'brand' => [
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
    