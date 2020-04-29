<?php
session_start();
require_once 'inc/functions.php';
require_once 'security.php';

if($_SESSION['admin'] = true)
{
setFlash('sudo', [
    'message' => 'добро пожаловать',
    'title' => 'Вход выполнен',
    'type' => 'success'
]);
}
goBack();