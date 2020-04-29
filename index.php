<?php
ob_start();
session_start();

require_once "inc/functions.php";
require_once "inc/data.php";
require_once "inc/routing.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <?php drawMenu($menu); ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container">
    <?php if(isAdmin()): ?>
        <div class="alert alert-dark" role="alert">
            <h3>Administrator</h3>
        </div>
    <?php endif; ?>
    <div class="starter-template">
        <h1 style="color: <?= $headerColor?>"><?= $pageTitle ?></h1>
        <div class="row">
            <div class="col-4">
                <?php drawMenu($menu, true); ?>
            </div>
            <div class="col-8">
                <?php include $include;?>
            </div>
        </div>
    </div>

</div>

<footer class="footer">
    <p>© Company <?= $year; ?></p>
</footer>
<?php include "views/sudo.view.php";?>
</body>
</html>
