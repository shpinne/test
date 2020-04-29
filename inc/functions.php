<?php

/**
 * @param $rows
 * @param $cols
 * @param $color
 */
function drawTable($rows, $cols, $color)
{
    echo '<table class="table table-bordered">';
    for($tr = 1; $tr <= $rows; $tr++){
        echo "<tr>";
        for($td = 1; $td <= $cols; $td++){
            if($td == 1 or $tr == 1){
                echo "<td style=\"background: $color\">" . $td * $tr . "</td>";
            }else{
                echo "<td>" . $td * $tr . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * @param $menu
 * @param bool $vertical
 */
function drawMenu($menu, $vertical=false)
{
    $ulClass = 'navbar-nav mr-auto';
    $liClass = 'nav-item';

    if($vertical){
        $ulClass = 'list-group';
        $liClass = 'list-group-item';
    }

    echo "<ul class=\"$ulClass\">";
    foreach($menu as $item){
        echo "<li class=\"$liClass\">";
        echo "<a class=\"nav-link\" href=\"{$item['href']}\">{$item['title']} <span class=\"sr-only\">(current)</span></a>";
        echo "</li>";
    }
    echo "</ul>";
}

/**
 * @return bool
 */
function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getRequest($key, $default=null)
{
    return array_key_exists($key, $_REQUEST) ? $_REQUEST[$key] : $default;
}

function authenticate() {
    //header используется для отправки HTTP заголовка

    header( "WWW-Authenticate: Basic realm=\"Test Authentication System\"");
    header( "HTTP/1.0 401 Unauthorized");
    echo "You must enter a valid login ID and password to access this resource\n";
    exit;
}

function goBack()
{
    $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    header('Location: ' . $url);//редирект или перенаправление
    die;
}

function isAdmin()
{
    return isset($_SESSION['admin']) and $_SESSION['admin'] === true;
}

function setFlash($key, $value)
{
    $_SESSION['flash'][$key] = $value;
}

function getFlash($key)
{
    $value = $_SESSION['flash'][$key];
    $_SESSION['flash'][$key] = null;

    return $value;
}

function hasFlash($key)
{
    return isset($_SESSION['flash'][$key]) and ! is_null($_SESSION['flash'][$key]);
}

function creationUploadDirIfNoteExists($dirName = 'upload')
{
    if (!is_dir($dirName)) {
        mkdir($dirName);
    }
    return $dirName;
}

/*function xss($data)
{
    if (is_array($data)) { //Если это массив
        $result = array(); //Создаем новый массив
        foreach ($data as $key => $value) { //Перебираем исходный массив
            $result[$key] = xss($value); //Рекурсивно вызываем ф-ю xss
        }
        return $result;//Возвращаемый запрошенный массив
    }
    return htmlspecialchars($data, ENT_QUOTES); //Если это не массив, то вызываем htmlspecialchars()
}
*/