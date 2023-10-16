<?php 

namespace App\Libraries;

use App\Entities\Service;
use App\Models\ServiceModel;

class ServiceService extends MyBaseService{

    public function renderServices(): string{
        $services = model(ServiceModel::class)->orderBy('created_at', 'asc')->findAll();


        if(empty($services)){
            return self::TEXT_NO_DATA;
        }

        $this->htmlTable->setHeading('Ação','Descrição', 'Número da OS', 'Data de Abertura', 'Veículo Associado / Placa', 'Total' );
        
        foreach ($services as $service){
            $vehicleName = $service->getVehicleName();
            $this->htmlTable->addRow([
                $this->renderBtnActions($service),
                $service->description,
                $service->id,
                $service->createdAt(),
                $vehicleName,
                $service->total,
            ]);
        }

        return $this->htmlTable->generate();
    }

    private function renderBtnActions(Service $service): string
    {

        $btnActions = '<div class="btn-group">';
        $btnActions .= '<button type="button" 
                            class="btn btn-outline-primary btn-sm dropdown-toggle" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">Ações
                        </button>';
        $btnActions .= '<div class="dropdown-menu">';
        $btnActions .= anchor(route_to('services.edit', $service->id), 'Editar', ['class' => 'dropdown-item']);
        $btnActions .= anchor(route_to('services.discount', $service->id), 'Aplicar Desconto', ['class' => 'dropdown-item']);
        $btnActions .= view_cell(
            library: 'ButtonsCell::destroy',
            params: [
                'route'       => route_to('services.destroy', $service->id),
                'btn_class'   => 'dropdown-item py-2'
            ]
        );

        $btnActions .= ' </div>
                        </div>';

        return $btnActions;
    }

    public function getServicesDate($dataInicial, $dataFinal){
    $db = \Config\Database::connect();

    $query = $db->table('services')
            ->select('created_at, total, description')
            ->where('created_at >=', $dataInicial)
            ->where('created_at <=', $dataFinal)
            ->get()
            ->getResult();

    return $query;
    }
}