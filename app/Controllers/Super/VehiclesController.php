<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Vehicle;
use App\Libraries\VehicleService;
use App\Models\VehicleModel;
use CodeIgniter\Config\Factories;

class VehiclesController extends BaseController
{
    private VehicleService $vehicleService;
    private VehicleModel $vehicleModel;

    public function __construct(){
        $this->vehicleService = Factories::class(VehicleService::class);
        $this->vehicleModel = model(VehicleModel::class);
    }

    public function index(){
        $data = [
            'title'   => 'Veículos',
            'vehicles' => $this->vehicleService->renderVehicles(),
        ];

        return view('Back/Vehicles/index', $data);
    }
    
    public function edit(int $id){
       // $this->checkMethod('put');
        //dd($vehicle);
        $data = [
            'title'         => 'Editar dados do Veículo',
            'vehicle'        => $vehicle = $this->vehicleModel->findOrFail($id),
        ];
        

        return view('Back/Vehicles/edit', $data);
    }

    public function create()
    {
        $this->checkMethod('post');

        $vehicle = new Vehicle($this->clearRequest());

        if (!$this->vehicleModel->insert($vehicle)) {
            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->vehicleModel->errors());
        }
        return redirect()->route('vehicles')->with('success', 'Sucesso!');
    }

    public function new(){
        // $this->checkMethod('put');
         //dd($vehicle);
         $data = [
             'title'         => 'Adicionar novo Veículo',
             'vehicle'        => new Vehicle()
         ];
         
 
         return view('Back/Vehicles/new', $data);
     }

    public function update(int $id)
    {
        $this->checkMethod('put');

        $vehicle = $this->vehicleModel->findOrFail($id);

        $vehicle->fill($this->clearRequest());

        if (!$vehicle->hasChanged()) {
            return redirect()->back()->with('info', 'Não há dados para atualizar');
        }

        $success = $this->vehicleModel->save($vehicle);

        //dd($this->vehicleModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->vehicleModel->errors());
        }
        return redirect()->route('vehicles')->with('success', 'Sucesso!');
    }

    public function destroy(int $id)
    {
        $this->checkMethod('delete');

        $vehicle = $this->vehicleModel->findOrFail($id);

        $this->vehicleModel->delete($vehicle->id);

        return redirect()->route('vehicles')->with('success', 'Sucesso!');
    }
}
