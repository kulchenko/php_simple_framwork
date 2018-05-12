<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

class EmptyController extends Controller 
{
	public function indexAction() 
	{
		return 'Нет такого контроллера!';
	}
}
