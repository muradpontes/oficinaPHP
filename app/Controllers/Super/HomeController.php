<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('Back/Home/index');
    }
}
