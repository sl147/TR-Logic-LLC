<?php
/*
/ создает екземпляр класса для записи в БД с заданным логином и паролем
/ возвращает:
/ true  - записано
/ false - нет
/*/

require_once ('../models/User.php');

$login    = trim(strip_tags($_GET['login']));
$password = trim(strip_tags($_GET['password']));
$user     = new User();
echo json_encode($user->register($login,$password));
?>