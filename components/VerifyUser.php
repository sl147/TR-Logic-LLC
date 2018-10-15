<?php
/**
/ создает екземпляр класса для проверки существование пользователя
/ с заданным логином и паролем
/ возвращает:
/ true  - есть пользователь с таким логином
/ false - нет
*/
require_once ('../models/User.php');

$login    = trim(strip_tags($_GET['login']));
$password = trim(strip_tags($_GET['password']));
$user     = new User();
echo json_encode($user->chekUserData($login,$password));
?>