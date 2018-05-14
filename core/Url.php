<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

class Url implements IUrl {
    
    public function getPath()
    {
        return ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }
    
    public function getArrayPath()
    {
        return explode('/', $this->getPath());
    }
}
