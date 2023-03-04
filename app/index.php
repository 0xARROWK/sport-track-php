<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

ini_set('session.cache_limiter','public');
session_cache_limiter(false);

require_once 'model/SportsmanDAO.php';
require_once 'model/Sportsman.php';
require_once 'controllers/ApplicationController.php';

if (!isset($_REQUEST['page'])) {
    $_REQUEST['page'] = '/';
}

$controller = ApplicationController::getInstance()->getController($_REQUEST);

if ($controller != null) {
    require_once "controllers/$controller.php";
    (new $controller())->handle($_REQUEST);
}

if (!isset($_SESSION['error'])) {

    $view = ApplicationController::getInstance()->getView($_REQUEST);

    if ($view != null) {
        require_once "views/$view.php";
    }

} else {

    require_once "views/ErrorView.php";

}

?>