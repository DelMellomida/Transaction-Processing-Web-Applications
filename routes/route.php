<?php
session_start();

function route($uri)
{
    switch ($uri) {
        case '/':
            include 'resources/views/overview.php';
            break;

        case '/login':
            include '../resources/views/login.php';
            break;

        case '/register':
            include ',,/resources/views/register.php';
            break;

        case '/best-selling':
            include '../resources/views/best_selling.php';
            break;

        case '/logout':
            session_unset();
            session_destroy();
            header('Location: /');
            break;

        default:
            include 'resources/views/404.php';
            break;
    }
}
