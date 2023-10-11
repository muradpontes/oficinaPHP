<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Client;
use App\Libraries\ClientService;
use App\Models\ClientModel;
use CodeIgniter\Config\Factories;

class ClientsController extends BaseController
{
    private ClientService $clientService;
    private ClientModel $clientModel;

    public function __construct(){
        $this->clientService = Factories::class(ClientService::class);
        $this->clientModel = model(ClientModel::class);
    }

    public function index(){
        $data = [
            'title'   => 'Clientes',
            'clients' => $this->clientService->renderClients(),
        ];

        return view('Back/Clients/index', $data);
    }
    
    public function edit(int $id){
       // $this->checkMethod('put');
        //dd($client);
        $data = [
            'title'         => 'Editar dados do Cliente',
            'client'        => $client = $this->clientModel->findOrFail($id),
        ];
        

        return view('Back/Clients/edit', $data);
    }

    public function create()
    {
        $this->checkMethod('post');

        $client = new Client($this->clearRequest());

        if (!$this->clientModel->insert($client)) {
            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->clientModel->errors());
        }
        return redirect()->route('clients')->with('success', 'Sucesso!');
    }

    public function new(){
        // $this->checkMethod('put');
         //dd($client);
         $data = [
             'title'         => 'Adicionar novo Cliente',
             'client'        => new Client()
         ];
         
 
         return view('Back/Clients/new', $data);
     }

    public function update(int $id)
    {
        $this->checkMethod('put');

        $client = $this->clientModel->findOrFail($id);

        $client->fill($this->clearRequest());

        if (!$client->hasChanged()) {
            return redirect()->back()->with('info', 'Não há dados para atualizar');
        }

        $success = $this->clientModel->save($client);

        //dd($this->clientModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->clientModel->errors());
        }
        return redirect()->route('clients')->with('success', 'Sucesso!');
    }

    public function destroy(int $id)
    {
        $this->checkMethod('delete');

        $client = $this->clientModel->findOrFail($id);

        $this->clientModel->delete($client->id);

        return redirect()->route('clients')->with('success', 'Sucesso!');
    }
}
