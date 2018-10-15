<?php

class UserController
{

	function actionAuthor()
	{
		require_once 'views/user/author.php';
		return true;
		}

	public function actionIndex()
	{
		require_once 'views/user/register.php';
		return true;
	}

	public function actionProfile($id) {	
		$user     = User::getUserById($id);
		$userMetas = User::getMetaUserById($id);

		require_once ('views/user/profile.php');
		return true;  
	}

}
?>