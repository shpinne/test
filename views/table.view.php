<?php
require 'security.php';

$rows   = getRequest('rows', 10);
$cols   = getRequest('cols', 10);
$color  = getRequest('color', 'green');

$histories = [];

if(isset($_COOKIE['history'])){
    $histories = unserialize($_COOKIE['history']);
}

if(isPost()){
    $history = [
        'color' => $color,
        'rows' => $rows,
        'cols' => $cols,
        'time' => time()
    ];

    array_unshift($histories, $history);

    setcookie('history', serialize($histories), 0x7FFFFFFF);
}
?>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="form-row">
        <div class="col">
            <input name="rows" type="text" class="form-control" placeholder="Колонки">
        </div>
        <div class="col">
            <input type="text" name="cols" class="form-control" placeholder="Ряды">
        </div>
        <div class="col">
            <input type="color" name="color" class="form-control">
        </div>
        <div class="col">
            <input type="submit" class="form-control" value="Нарисовать">
        </div>
    </div>
</form>
<hr>
<?php drawTable($rows, $cols, $color); ?>

<?php if(! empty($histories)): ?>
    <table class="table table-bordered">
        <tr>
            <th>Колонки</th>
            <th>Ряды</th>
            <th>Цевет</th>
            <th>Время</th>
        </tr>
    <?php foreach ($histories as $history): ?>
        <tr>
            <td><?= $history['cols'] ?></td>
            <td><?= $history['rows'] ?></td>
            <td><div style="width: 20px; height: 20px; background:<?=$history['color']?>"></div></td>
            <td><?= date('d-m-Y H:i:s', $history['time']) ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>