<?

$kuda='a@a.com';
$zagolovok='сообщение с сайта';
$headers='Content-type: text; charset="utf-8"';
?>


<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="form-row">
        <div class="col">
            <input type="text" name="fio" class="form-control" placeholder="ФИО">
        </div>
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
        <div class="col">
            <TEXTAREA name="Text" COLS="50" ROWS="5" class="form-control" placeholder="Собщение"></TEXTAREA>
        </div>
        <div class="col">
            <input type="submit" name="Ok" value="Отправить">
        </div>
    </div>
</form>

<?php if (isset($_POST['ok'])){

    $fio=$_POST['fio'];
    $email=$_POST['email'];
    $text=$_POST['Text'];

    $messages=$text."\n".$email."\n"."\n".$fio;
    if (mail($kuda,$zagolovok,$messages,$headers)){echo "Ваше сообщение доставлено.";}

}
?>