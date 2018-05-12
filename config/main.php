<?php

define('EXECUTE', true);

// Определение путей
define('PATH_ROOT', dirname($_SERVER['DOCUMENT_ROOT']));
define('PATH_CORE', PATH_ROOT . '/core/');
define('PATH_CONTROLLER', PATH_ROOT . '/controller/');
define('PATH_VIEW', PATH_ROOT . '/view/');

// Класс загрузки
define('APP', PATH_CORE . '/App.php');