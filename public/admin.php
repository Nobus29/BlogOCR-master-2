<?
ini_set('display_errors', 1);
error_reporting(E_ALL);

use  Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));


require ROOT . '/app/App.php';
App::load();



if(isset($_GET['p'])) $page = $_GET['p'];
else $page= 'posts.index';






