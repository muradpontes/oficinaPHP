<?php

namespace App\Models;
use App\Entities\Service;

class ServiceModel extends MyBaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Service::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'description',
        'total',
        'associated_vehicle',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero',
        'description' => 'required|max_length[128]',
    ];
    protected $validationMessages = [
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['escapeCustomData'];
    protected $beforeUpdate = ['escapeCustomData'];

}


    