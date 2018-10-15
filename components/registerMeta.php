<?php
/*
/ создает екземпляр класса для записи в БД  метаданных пользователя с заданным id
/ возвращает:
/ true  - записано
/ false - нет
/*/

require_once ('../models/User.php');

$id    = trim(strip_tags($_GET['id']));
$meta  = trim(strip_tags($_GET['meta']));
$value = trim(strip_tags($_GET['value']));
$user  = new User();
echo json_encode($user->registerMeta($id, $meta, $value));
?>