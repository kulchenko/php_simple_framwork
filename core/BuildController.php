<?php
namespace core;

class BuildController
{
    private $name = 'Home';
    private $action = 'index';
    private $controller;
    private $params = array();
    
    public function __construct(IUrl $url)
    {
        $this->setParams($url);
        $this->setName();
        $this->setAction();
        $this->generateController();
    }
    
    public function setParams(IUrl $url)
    {
        $this->params = $url->getArrayPath();
    }
    
    public function setName()
    {
        if (! empty($this->params[0])) {
            $this->name = ucfirst($this->params[0]);
        }
    }
    
    public function setAction()
    {
        if (! empty($this->params[1])) {
            $this->action = $this->params[1];
        }
    }
    
    public function generateController()
    {
        $this->name =  '\\controller\\' . $this->name . 'Controller';
        
        if (class_exists($this->name)) {
            $this->controller = new $this->name();
        } else {
            $this->controller = new \core\EmptyController();
        }
    }
    
    public function getAction()
    {
        $this->action =  $this->action . 'Action';
        
        if (method_exists($this->controller, $this->action)) {
            return call_user_func_array(array($this->controller, $this->action), array_slice($this->params, 2));
        }
        
        return call_user_func_array(array($this->controller, 'indexAction'), array_slice($this->params, 1));
    }
}

