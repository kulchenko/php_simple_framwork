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

		$controller = '\\controller\\HomeController';
		$action = 'indexAction';

		if (! empty($params[0])) {
			$controller = '\\controller\\' . ucfirst($params[0]) . 'Controller';
		}

		if (! empty($params[1])) {
			$action = $params[1] . 'Action';
		}

		$controller = self::getController($controller);

		echo self::getAction($controller, $action, $params);
	}

	public static function getController($controller) 
	{
		if (class_exists($controller)) {
			return new $controller();
		} else {
			return new \core\EmptyController();
		}
	}

	public static function getAction(IController $controller, $action, array $params = array()) 
	{
		if (method_exists($controller, $action)) {
			return call_user_func_array(array($controller, $action), array_slice($params, 2));
		}

		return call_user_func_array(array($controller, 'indexAction'), array_slice($params, 1));
	}
}
