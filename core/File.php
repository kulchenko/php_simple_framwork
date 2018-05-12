<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

class File
{
    public static function load($filename)
    {
        if (file_exists($filename)) {
            return include($filename);
        }
        
        return '';
    }
}

