<?php
/*
* создает екземпляр класса для проверки существование пользователя  
* с заданным логином 
* возвращает:
* true  - есть пользователь с таким логином
* false - нет
*/

require_once ('../models/User.php');
$login = trim(strip_tags($_GET['login']));
$user  = new User();

echo json_encode($user->chekLoginExist($login));
?>