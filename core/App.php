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
        
        $buildController = new BuildController(new Url());
        echo $buildController->getAction();
    }
}