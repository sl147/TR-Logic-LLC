<?php
/*
/ получение пользователя с заданным логином
/ возвращает объект с id, логином, паролем
/*/

require_once ('../models/User.php');

$login = trim(strip_tags($_GET['login']));
$user  = new User();
echo json_encode($user->getUserByLogin($login));
?>