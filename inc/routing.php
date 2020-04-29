<?php
$page = getRequest('p', 'index');
$title = 'Главная';
$pageTitle = "$greet, сегодня $day день $month месяц $year год";
$include = "views/index.view.php";

switch($page){
    case 'table':
        $title = 'Таблица умножения';
        $pageTitle = "Таблица умножения";
        $include = 'views/table.view.php';
        break;
    case 'contacts':
        $title = 'Связаться с нами';
        $pageTitle = "Связаться с нами";
        $include = 'views/contacts.view.php';
        break;
    case 'instagram':
        $title = 'Инстаграм';
        $pageTitle = "Your Life";
        $include = 'views/instagram.view.php';
        break;
    case 'Log':
        $title = 'Log';
        $pageTitle = "Посетители";
        $include = 'session/Log.php';
        break;
    case 'comment':
        $title = 'comment&page_id=';
        $pageTitle = "Комментировать";
        $include = 'views/comment.php';
        break;
}