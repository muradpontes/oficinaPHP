<?php

namespace App\Models;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;
use App\Entities\Service;

class MyBaseModel extends Model
{    
    protected function escapeCustomData(array $data): array{
        if (!isset($data['data'])){
            return $data;
        }
        foreach ($this->allowedFields as $attribute){
            if(isset($data['data'][$attribute])){
                if($attribute === 'services'){
                    continue;
                }

                $data['data'][$attribute] = esc($data['data'][$attribute]);
            }
        }
        return $data;

    }

    public function findOrFail(int|string $id): object
    {

        $row = $this->find($id);

        return $row ?? throw new PageNotFoundException("Registro {$id} não encontrado");
    }
}


    