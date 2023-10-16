<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Service;
use App\Libraries\ServiceService;
use App\Models\ServiceModel;
use CodeIgniter\Config\Factories;

class ServicesController extends BaseController
{
    private ServiceService $serviceService;
    private ServiceModel $serviceModel;

    public function __construct(){
        $this->serviceService = Factories::class(ServiceService::class);
        $this->serviceModel = model(ServiceModel::class);
    }

    public function index(){
        $data = [
            'title'   => 'Serviços',
            'services' => $this->serviceService->renderServices(),
        ];

        return view('Back/Services/index', $data);
    }
    
    public function edit(int $id){
       // $this->checkMethod('put');
        //dd($service);
        $data = [
            'title'         => 'Editar dados do Serviço',
            'service'        => $service = $this->serviceModel->findOrFail($id),
        ];
        

        return view('Back/Services/edit', $data);
    }

    public function create()
    {
        $this->checkMethod('post');

        $service = new Service($this->clearRequest());

        if (!$this->serviceModel->insert($service)) {
            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->serviceModel->errors());
        }
        return redirect()->route('services')->with('success', 'Sucesso!');
    }

    public function new(){
        // $this->checkMethod('put');
         //dd($service);
         $data = [
             'title'         => 'Adicionar novo Serviço',
             'service'        => new Service()
         ];
         
 
         return view('Back/Services/new', $data);
     }

    public function update(int $id)
    {
        $this->checkMethod('put');

        $service = $this->serviceModel->findOrFail($id);

        $service->fill($this->clearRequest());

        if (!$service->hasChanged()) {
            return redirect()->back()->with('info', 'Não há dados para atualizar');
        }

        $success = $this->serviceModel->save($service);

        //dd($this->serviceModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->serviceModel->errors());
        }
        return redirect()->route('services')->with('success', 'Sucesso!');
    }


    public function discount(int $id){

         $data = [
             'title'         => 'Editar dados do Serviço',
             'service'        => $service = $this->serviceModel->findOrFail($id),
         ];
         
 
         return view('Back/Services/discount', $data);
     }

     public function discounted(int $id)
    {
        $this->checkMethod('put');

        $service = $this->serviceModel->findOrFail($id);

        $service->fill($this->clearRequest());

        if (!$service->hasChanged()) {
            return redirect()->back()->with('info', 'Não há dados para atualizar');
        }

        $success = $this->serviceModel->save($service);

        //dd($this->serviceModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->serviceModel->errors());
        }
        return redirect()->route('services')->with('success', 'Sucesso!');
    }

    public function destroy(int $id)
    {
        $this->checkMethod('delete');

        $service = $this->serviceModel->findOrFail($id);

        $this->serviceModel->delete($service->id);

        return redirect()->route('services')->with('success', 'Sucesso!');
    }

    public function report(){
        $data = [
            'title'   => 'Relatório de Serviços',
            'services' => $this->serviceService->renderServices(),
        ];

        return view('Back/Services/report', $data);
    }
}
