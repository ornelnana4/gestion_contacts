<?php
require_once 'controllers/ContactController.php';

$controller = new ContactController();
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'list':
        $contacts = $controller->list();
        include 'views/contact_list.php';
        break;

    case 'add':
        $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->create($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone']);
    if ($result === true) {
        header("Location: index.php");
        exit;
    } else {
        $message = $result; // Message d'erreur affiché dans la vue
    }
}

include 'views/contact_form.php';


    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->edit($id, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone']);
            header("Location: index.php");
            exit;
        }
        $contact = $controller->get($id);
        include 'views/contact_edit.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $controller->delete($id);
        header("Location: index.php");
        exit;

    default:
        echo "Action non reconnue.";
}
