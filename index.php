<?php

// вывод ошибок отключен, т.к. сейчас он не нужен и при первом вхождении, когда переменная  $routes = $_GET['url']; будет не определена, т.к. еще не будет значения url, будет выводтся ошибка 
ini_set('display_errors', 0);
require_once 'application/bootstrap.php';
// $url = $_GET['url'];echo $url;