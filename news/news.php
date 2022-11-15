<?php

spl_autoload_register(function ($cl){
  include $cl . '.class.php';
});
$news = new NewsDB;
$errMsg = '';
if($_POST['title'] != '' && $_POST['category'] != '' && $_POST['description'] != '' && $_POST['source'] != ''){
  require_once('save_news.inc.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
</head>
<body>
  <h1>Последние новости</h1>
  <?php
    if(!empty($errMsg)){
      echo $errMsg;
    }
  ?>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    Заголовок новости:<br />
    <input type="text" name="title" required/><br />
    Выберите категорию:<br />
    <select name="category" required>
      <option value="1">Политика</option>
      <option value="2">Культура</option>
      <option value="3">Спорт</option>
    </select>
    <br />
    Текст новости:<br />
    <textarea required name="description" cols="50" rows="5"></textarea><br />
    Источник:<br />
    <input required type="text" name="source" /><br />
    <br />
    <input type="submit" value="Добавить!" />
</form>
<?php

?>
</body>
</html>