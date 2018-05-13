<?php
function compress($buffer) {
    /* удалить комментарии */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* удалить табуляции, пробелы, символы новой строки и т.д. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}

header('Content-type: text/css');
ob_start("compress");
/* css файлы */
include('base.css');
include('site.css');
include('form.css');
include('table.css');
include('flex.css');
include('info.css');
include('text.css');
include('wrap.css');
include('menu.css');
ob_end_flush();