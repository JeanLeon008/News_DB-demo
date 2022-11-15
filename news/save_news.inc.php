<?php
if($_POST['title'] != '' && $_POST['category'] != '' && $_POST['description'] != '' && $_POST['source'] != ''){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $source = $_POST['source'];
}
if($title != ''){
    $news->saveNews($title, $category, $description, $source);
}

