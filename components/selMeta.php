<?php
/*
* создает екземпляр класса для получения мета описаний реквизитов пользователя
* возвращает объект мета данных
*/

require_once ('../models/User.php');

$meta  = new User();
echo json_encode($meta->getMeta());
?>