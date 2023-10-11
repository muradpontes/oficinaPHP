<?php 

namespace App\Libraries;

use App\Entities\Client;
use App\Models\ClientModel;

class ClientService extends MyBaseService{
    public function renderClients(): string{
        $clients = model(ClientModel::class)->orderBy('name', 'ASC')->findAll();

        if(empty($clients)){
            return self::TEXT_NO_DATA;
        }

        $this->htmlTable->setHeading('Ação','Nome', 'Email', 'Telefone', 'Endereço');

        foreach ($clients as $client){

            $this->htmlTable->addRow([
                $this->renderBtnActions($client),
                $client->name,
                $client->email,
                $client->phone,
                $client->address,
            ]);
        }

        return $this->htmlTable->generate();
    }

    private function renderBtnActions(Client $client): string
    {

        $btnActions = '<div class="btn-group">';
        $btnActions .= '<button type="button" 
                            class="btn btn-outline-primary btn-sm dropdown-toggle" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">Ações
                        </button>';
        $btnActions .= '<div class="dropdown-menu">';
        $btnActions .= anchor(route_to('clients.edit', $client->id), 'Editar', ['class' => 'dropdown-item']);
        $btnActions .= view_cell(
            library: 'ButtonsCell::destroy',
            params: [
                'route'       => route_to('clients.destroy', $client->id),
                'btn_class'   => 'dropdown-item py-2'
            ]
        );

        $btnActions .= ' </div>
                        </div>';

        return $btnActions;
    }
}