<?php
require_once 'vendor/autoload.php';

$view = new \CodinPro\Lib\View(__DIR__ . '/src/View/');

if ($_POST) {
    $length = (int)$_POST['length'];
    $types = isset($_POST['types']) ? array_keys($_POST['types']) : [];

    $view->setVar('length', $length);
    $view->setVar('types', $_POST['types']);

    try {
        $generator = new \CodinPro\Lib\PasswordGenerator($length, $types);

        $password = $generator->generate();
        $view->setVar('password', $password);
    } catch (\Exception $e) {
        $error = $e->getMessage();
        $view->setVar('error', $error);
    }
}


echo $view->render('main');