<?php
namespace Core;
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');
spl_autoload_register();
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/db.php';
$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';
$track = ( new Router ) -> getTrack($routes, $_SERVER['REQUEST_URI']);
$page  = ( new Dispatcher ) -> getPage($track);
echo (new View) -> render($page);