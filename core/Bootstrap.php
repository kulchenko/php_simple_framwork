<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

class Bootstrap 
{

	public function __construct() 
	{
		$this->autoload_register();
	}

	public function autoload_register() 
	{
		spl_autoload_register(array($this, 'includeClass'));
	}

	public function includeClass($class_name) 
	{
		$filename = $this->generateFile($class_name);
		if (file_exists($filename)) {
			require_once $filename;
		}
	}

	public function generateFile($class_name)
	{
		$filename = PATH_ROOT . '/' . str_replace('\\', '/', $class_name);
		$filename .= '.php';
		return $filename;
	}
}