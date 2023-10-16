<?php 

namespace App\Libraries;

use App\Entities\Vehicle;
use App\Models\VehicleModel;

class VehicleService extends MyBaseService{
    public function renderVehicles(): string{
        $vehicles = model(VehicleModel::class)->orderBy('brand', 'ASC')->findAll();

        if(empty($vehicles)){
            return self::TEXT_NO_DATA;
        }

        $this->htmlTable->setHeading('Ações','Marca','Modelo', 'Ano', 'Placa', 'Cliente');

        foreach ($vehicles as $vehicle){
            $clientName = $vehicle->getClientName();
            $this->htmlTable->addRow([
                $this->renderBtnActions($vehicle),
                $vehicle->brand,
                $vehicle->model,
                $vehicle->year,
                $vehicle->license_plate,
                $clientName,
            ]);
        }

        return $this->htmlTable->generate();
    }

    private function renderBtnActions(Vehicle $vehicle): string
    {

        $btnActions = '<div class="btn-group">';
        $btnActions .= '<button type="button" 
                            class="btn btn-outline-primary btn-sm dropdown-toggle" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">Ações
                        </button>';
        $btnActions .= '<div class="dropdown-menu">';
        $btnActions .= anchor(route_to('vehicles.edit', $vehicle->id), 'Editar', ['class' => 'dropdown-item']);
        $btnActions .= view_cell(
            library: 'ButtonsCell::destroy',
            params: [
                'route'       => route_to('vehicles.destroy', $vehicle->id),
                'btn_class'   => 'dropdown-item py-2'
            ]
        );

        $btnActions .= ' </div>
                        </div>';

        return $btnActions;
    }
}