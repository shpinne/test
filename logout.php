<?php
session_start();
$_SESSION['admin'] = null;

$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
header('Location: ' . $url);