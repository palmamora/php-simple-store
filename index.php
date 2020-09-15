<?php 
session_start();
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'helpers/Utils.php';
require_once 'config/Connection.php';
require_once 'models/User.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
require_once 'views/layout/main.php';


function showError()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nameController = default_controller;
} else {
    showError();
}

if (class_exists($nameController)) {
    $controller = new $nameController();

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action = default_action;
        $controller->$action();
    } else {
        showError();
    }
} else {
    showError();
}

require_once 'views/layout/footer.php';
