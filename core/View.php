<?php
/**
 * @author   Kulchenko Ivan Sergeevich
 * @email 	kulchenko_ivan@mail.ru
 * @site      https://simple.siweb.ru/
 * @copyright 2018
 */

namespace core;

defined('EXECUTE') or die();

class View implements IView
{
    public function render($filename, array $data = array())
    {
        if (! empty($data)) {
            extract($data);
        }
        
        $filename = $this->generateFile($filename);
        
        if (file_exists($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        } elseif (isset($content)) {
            return $content;
        }
        
        return '';
    }
    
    public function generateFile($filename)
    {
        return PATH_ROOT . '/view/' . $filename . '.php';
    }
}

