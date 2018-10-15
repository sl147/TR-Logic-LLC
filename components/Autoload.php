<?php
/*
/ проверка существование класса с именем $class_name в папках $array_path
/ подключает файл класса
/*/
	spl_autoload_register(function ($class_name)
	{
		$array_path = array(
		'models/' , 
		'components/' , 
			);	

		foreach ($array_path as $path) {
			$path = $path.$class_name.".php";		
			if (is_file($path)) include_once $path;
		}
	});
?>