<?php
namespace controller;

use core\Controller;

class HomeController extends Controller
{
    protected $layout = 'layout/main';
    
    public function indexAction()
    {
        return $this->render('index', ['title'=>'Framework Small PHP']);
    }
}

