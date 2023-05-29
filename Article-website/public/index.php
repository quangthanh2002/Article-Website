<?php
require_once '../config.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $articleController->index();
        break;
    case 'create':
        $articleController->create();
        break;
    case 'store':
        $articleController->store();
        break;
    case 'edit':
        $id = $_GET['id'];
        $articleController->edit($id);
        break;
    case 'update':
        $id = $_GET['id'];
        $articleController->update($id);
        break;
    case 'show':
        $id = $_GET['id'];
        $articleController->show($id);
        break;
    case 'delete':
        $id = $_GET['id'];
        $articleController->delete($id);
        break;
    default:
        echo '404 Not Found';
        break;
}
