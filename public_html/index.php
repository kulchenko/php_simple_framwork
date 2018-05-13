<?php

require_once '../config/main.php';
require_once APP;

use core\App;

try {
    App::run();
} catch (\Exception $e) {
    echo $e->getMessage();
} catch (\Error $e) {
    echo $e->getMessage();
}