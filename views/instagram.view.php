<?php

    if (isPost())
    {
        $email = getRequest('email');//получаем данные из поля ввода email
        $email = htmlspecialchars($email);
        $msg = getRequest('msg');//получаем данные из поля ввода msg
        $msg = htmlspecialchars($msg);
        $valid_types = array('gif', 'jpg', 'png', 'jpeg', 'bmp');
        $from = $_FILES['photo']['tmp_name'];//путь временного хранения файлов
        $fileName = $_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);//возвращает информацию о пути к файлу
        $flashData  = [
            'title' => 'Ошибка загрузки',
            'message' => 'Не удалось разместить ваш пост',
            'type' => 'error'
        ];

        if(0 === $error and in_array($fileExt, $valid_types)) {
            $dirName = creationUploadDirIfNoteExists(); //если нет директории, создаем
            $pathFile = $dirName . '/' . $fileName;
            $db = mysqli_connect('localhost','root','','instagram');
            $prepareData = array_map(function ($item) use ($db){
                return mysqli_real_escape_string($db, $item);
            }, compact("email","msg", "pathFile", "fileName"));
            if (move_uploaded_file($from, $pathFile)) {
                $sql ="INSERT INTO `instagram` VALUES (NULL, '{$prepareData['email']}', '{$prepareData['msg']}', '{$prepareData['pathFile']}', '{$prepareData['fileName']}', NOW())";
                $result = mysqli_query($db, $sql);
                $flashData = [
                    'title' => 'Файл успешно загружен',
                    'message' => 'Ваш пост будет опубликован',
                    'type' => 'success'
                ];

            }
        }
        setFlash('sudo', $flashData);
        goBack();
    }
?>

<form action="<?php $_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control"  placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="msg">Ваше послание</label>
    <textarea name="msg" class="form-control" id="Ваше послание" rows="2"></textarea>
  </div>
  <div class="form-group">
    <input type="file" name="photo" class="form-control-file" >
  </div>
    <button class="btn btn-primary" type="submit">Отправить</button>
    <div>
        <a class="pull-right" href="/index.php?p=comment&page_id= <?= $_POST['page_id'] ?>" target="_blank">Комментировать(10)</a>
    </div>

</form>

<?php
$db = mysqli_connect('localhost','root','','instagram');
$sql1 = "SELECT * FROM `instagram` ORDER BY `id` DESC";
$result1 = mysqli_query($db, $sql1);
$res = mysqli_fetch_all($result1, MYSQLI_ASSOC);
if (is_array($res) and count($res)) : ?>
<?php foreach ($res as $post => $key) : ?>

        <div class="card" style="width: 20rem;">
        <img class="card-img-top" src='<?= $key['pathFile']; ?>' alt=''>
        <div class="card-body">
            <p class="card-text"><?=$key['msg']; ?></p>
        </div>

<?php endforeach ; ?>
<?php endif ; ?>
