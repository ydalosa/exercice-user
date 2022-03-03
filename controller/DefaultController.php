<?php

namespace App\controller;

use App\core\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        
        $this->renderView('default/index');
    }
}