<?php

use App\Controllers\Super\ClientsController;
use App\Controllers\Super\HomeController;
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

});
