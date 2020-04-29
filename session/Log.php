<?php
$logs = [
    'argv',
    'SERVER_ADDR',
    'SERVER_NAME',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'REMOTE_ADDR',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'REQUEST_URI',
] ;

echo '<table class="table table-bordered">' ;
foreach ($logs as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td style="background-color: transparent;: auto">'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
}
echo '</table>' ;

