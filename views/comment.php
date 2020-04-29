<?php
$name = $_POST['name'];
$page_id = $_POST['page_id'];
$text_comment = $_POST['text_comment'];
$name = htmlspecialchars($name);
$text_comment = htmlspecialchars($text_comment);
$mysqli = mysqli_connect('localhost', 'root', '', 'site');
$sql = "INSERT INTO `comments` (`name`, `page_id`, `text_comment`,`date`) VALUES ( '$name', '$page_id', '$text_comment', NOW())";
$result = mysqli_query($mysqli, $sql);
?>

<form name="comment" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
  <p>
    <label>Имя:</label>
    <input type="text" name="name" />
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="5"></textarea>
  </p>
  <p>
    <input type="hidden" name="page_id" value="1" />
    <input type="submit" value="Отправить" />
  </p>
</form>

<?php
$page_id = 1;
$mysqli = mysqli_connect('localhost', 'root', '', 'instagram');
$sql = "SELECT * FROM `comments` ORDER BY `id`";
$result = mysqli_query($mysqli, $sql);
$set = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($set as $row => $i) {
    print_r($i['text_comment']);
    echo "<br />";
}
?>