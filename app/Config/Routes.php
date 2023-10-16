<?php

use App\Controllers\Super\ClientsController;
use App\Controllers\Super\HomeController;
use App\Controllers\Super\ServicesController;
use App\Controllers\Super\VehiclesController;
use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');


$routes->group('super', static function ($routes){
    $routes->get('/', [HomeController::class, 'index'], ['as' => 'super.home']);
    
    $routes->group('clients', static function ($routes) {
        $routes->get('/', [ClientsController::class, 'index'], ['as' => 'clients']);
        $routes->get('edit/(:num)', [ClientsController::class, 'edit/$1'], ['as' => 'clients.edit']);
        $routes->put('update/(:num)', [ClientsController::class, 'update/$1'], ['as' => 'clients.update']);
        $routes->get('new', [ClientsController::class, 'new'], ['as' => 'clients.new']);
        $routes->post('create', [ClientsController::class, 'create'], ['as' => 'clients.create']);
        $routes->delete('destroy/(:num)', [ClientsController::class, 'destroy/$1'], ['as' => 'clients.destroy']);
    });

    $routes->group('services', static function ($routes) {
        $routes->get('/', [ServicesController::class, 'index'], ['as' => 'services']);
        $routes->get('edit/(:num)', [ServicesController::class, 'edit/$1'], ['as' => 'services.edit']);
        $routes->put('update/(:num)', [ServicesController::class, 'update/$1'], ['as' => 'services.update']);
        $routes->get('new', [ServicesController::class, 'new'], ['as' => 'services.new']);
        $routes->post('create', [ServicesController::class, 'create'], ['as' => 'services.create']);
        $routes->delete('destroy/(:num)', [ServicesController::class, 'destroy/$1'], ['as' => 'services.destroy']);
        $routes->get('discount/(:num)', [ServicesController::class, 'discount/$1'], ['as' => 'services.discount']);
        $routes->put('discounted/(:num)', [ServicesController::class, 'discounted/$1'], ['as' => 'services.discounted']);
        $routes->get('report', [ServicesController::class, 'report'], ['as' => 'services.report']); 
    });

    $routes->group('vehicles', static function ($routes) {
        $routes->get('/', [VehiclesController::class, 'index'], ['as' => 'vehicles']);
        $routes->get('edit/(:num)', [VehiclesController::class, 'edit/$1'], ['as' => 'vehicles.edit']);
        $routes->put('update/(:num)', [VehiclesController::class, 'update/$1'], ['as' => 'vehicles.update']);
        $routes->get('new', [VehiclesController::class, 'new'], ['as' => 'vehicles.new']);
        $routes->post('create', [VehiclesController::class, 'create'], ['as' => 'vehicles.create']);
        $routes->delete('destroy/(:num)', [VehiclesController::class, 'destroy/$1'], ['as' => 'vehicles.destroy']);
    });

});
