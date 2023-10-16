<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;
use Config\Database;

class MyBaseEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function createdAt(): string{
        return Time::parse($this->created_at)->format('d-m-Y');
    }

    protected $ServiceModel;

    public function getVehicleName()
{
    if ($this->associated_vehicle) {
        $db = Database::connect();

        $query = $db->table('vehicles')
            ->select('CONCAT(brand, " ", model, " / ", license_plate) as brand_model_plate')
            ->where('id', $this->associated_vehicle)
            ->get();

        $row = $query->getRow();

        if ($row) {
            return $row->brand_model_plate;
        }
    }

    return 'Desconhecido';
}

public function getClientName()
{
    if ($this->client_id) {
        $db = Database::connect();

        $query = $db->table('clients')
            ->select('name')
            ->where('id', $this->client_id)
            ->get();

        $row = $query->getRow();

        if ($row) {
            return $row->name;
        }
    }

    return 'Desconhecido';
}



}
