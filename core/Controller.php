<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

abstract class Controller implements IController 
{
	protected $layout = 'layout/main';
	protected $view;

	public function __construct() 
	{
		$this->view = new View();
	}

	public function indexAction() 
	{
		return 'Переопределите метод indexAction !';
	}

	public function setView(IView $view) 
	{
		$this->view = $view;
	}

	public function render($filename, array $data = array()) 
	{
		$content = $this->view->render($filename, $data);
		$data['content'] = $content;
		return $this->view->render($this->layout, $data);
	}
}
