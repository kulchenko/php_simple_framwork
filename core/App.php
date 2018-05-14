<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

require_once 'Bootstrap.php';

class App
{
    
    public static function run()
    {
        $bootstrap = new Bootstrap();
        $params = Url::getPathList();
        
        $controller = 'Home';
        $action = 'index';
        
        if (! empty($params[0])) {
            $controller = ucfirst($params[0]);
        }
        
        if (! empty($params[1])) {
            $action = $params[1];
        }
        
        $controller = self::getController($controller);
        
        echo self::getAction($controller, $action, $params);
    }
    
    public static function getController($controller)
    {
        $controller = self::generateController($controller);
        
        if (class_exists($controller)) {
            return new $controller();
        } else {
            return new \core\EmptyController();
        }
    }
    
    public static function generateController($controller)
    {
        return '\\controller\\' . $controller . 'Controller';
    }
    
    public static function getAction(IController $controller, $action, array $params = array())
    {
        $action = self::generateAction($action);
        
        if (method_exists($controller, $action)) {
            return call_user_func_array(array($controller, $action), array_slice($params, 2));
        }
        
        return call_user_func_array(array($controller, 'indexAction'), array_slice($params, 1));
    }
    
    public static function generateAction($action)
    {
        return $action . 'Action';
    }
}