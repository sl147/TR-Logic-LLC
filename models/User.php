<?php
/**
* класс для работы с пользователями
*/

class User
{

/**
* подключение к базе данных
* @return  $db - новое подключение
*/

	private static function db()
	{
		$paramsPath = '../config/db_params.php';
		$params = include ($paramsPath);
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";		
		$db = new PDO($dsn,$params['user'],$params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		return $db;
	}

/**
* получение мета описаний
* @return  $array
*/

	public static function getMeta() {
		$arrayList  = [];
		$db         = self::db();
		$sql        = "SELECT * FROM test_Users_meta";
		$result     = $db -> query($sql);

		while ($row = $result->fetch()) {			
			$arrayList[] = $row;
		}
		return $arrayList;
	}

/**
* получение мета описаний по id
* @param   $id  id пользователя
* @return  $string
*/
	public static function getMetaNameById($id) {
		$db = Db::getConnection();
		$sql = "SELECT * FROM test_Users_meta WHERE id= :id";
		$result = $db -> prepare($sql);
		$result -> bindParam(':id', $id, PDO::PARAM_STR);
		$result -> execute();
		$res = $result->fetch();
		return $res['user_meta_name'];
	}


/**
* запись нового пользователя в БД и получение id нового пользователя
* @param   $login  логин пользователя
* @param   $password  пароль пользователя
* @return  $integer
*/
	public static function register ($login,$password) 
	{		
		$key = "qwwerrt";
		//$pw = "AES_ENCRYPT(".$password.",".$key.")";
		$db = self::db();
		$password = md5(md5(trim($password)));
		$sql = "INSERT INTO test_Users (user_login, user_password)
		 		VALUES(:login, :password)";
		$result = $db -> prepare($sql);
		$result -> bindParam(':login',    $login,    PDO::PARAM_STR);
		$result -> bindParam(':password', $password, PDO::PARAM_STR);
		$res = $result -> execute();
		$user = self::getUserByLogin ($login);
		return intval($user['id']);
	}

/**
* запись метаданных нового пользователя в БД
* @param   $login  логин пользователя
* @param   $password  пароль пользователя
* @return  $boolean
*/
	public static function registerMeta ($id, $meta, $value) 
	{
		$db = self::db();		
		$sql = "INSERT INTO test_data_Users (user_id, user_meta, value)
		 		VALUES(:user_id, :user_meta, :value)";
		$result = $db -> prepare($sql);
		$result -> bindParam(':user_id',   intval($id),    PDO::PARAM_STR);
		$result -> bindParam(':user_meta', $meta,  PDO::PARAM_STR);
		$result -> bindParam(':value',     $value, PDO::PARAM_STR);		
		$result -> execute();
		return true;			
}

/**
* получение пользователя по логину
* @param   $login  логин пользователя
* @return  $object
*/
	public static function getUserByLogin ($login) 
	{
		$db = self::db();
		$sql = "SELECT * FROM test_Users WHERE user_login= :login";
		$result = $db -> prepare($sql);
		$result -> bindParam(':login', $login, PDO::PARAM_STR);
		$result -> execute();
		return $result->fetch();
	}
	

/**
* проверка пользователя в БД по логину и паролю
* @param   $login  логин пользователя
* @param   $password  пароль пользователя
* @return  $boolean
*/
	public static function chekUserData ($login,$password) {
		$db = self::db();
		$password = md5(md5(trim($password)));
		$sql = "SELECT COUNT(*) FROM test_Users  WHERE user_login = :login AND user_password = :password";
		
		$result = $db -> prepare($sql);
		$result -> bindParam(':login', $login, PDO::PARAM_STR);
		$result -> bindParam(':password', $password, PDO::PARAM_STR);
		$result -> execute();

		//$user = $result-> fetch();
		if ($result->fetchColumn()) return true;
		return false;
	}


/**
* получение пользователя по id
* @param   $id  id пользователя
* @return  $object
*/
	public static function getUserById ($id) {
		if (intval($id)) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM test_Users WHERE id= :id";
			$result = $db -> prepare($sql);
			$result -> bindParam(':id', $id, PDO::PARAM_INT);
			$result -> setFetchMode(PDO::FETCH_ASSOC);
			$result -> execute();
			return $result->fetch();	
		}		
	}

/**
* получение метаданных пользователя по id
* @param   $id  id пользователя
* @return  $object
*/
	public static function getMetaUserById($id) {
		if (intval($id)) {
			$data = [];
			$db = Db::getConnection();
			$sql = "SELECT * FROM test_data_Users WHERE user_id = $id ORDER BY user_meta";
			$result = $db -> query($sql);
			while ($row = $result->fetch()) {			
				$data[] = $row;
		}
		return $data;
		}
	}


/**
* проверка пользователя в БД по логину
* @param   $login  логин пользователя
* @param   $password  пароль пользователя
* @return  $boolean
*/	
	public static function chekLoginExist ($login)	{
		$db = self::db();
		$sql = "SELECT COUNT(*) as count FROM test_Users WHERE user_login= :login";
		$result = $db -> prepare($sql);
		$result -> bindParam(':login', $login, PDO::PARAM_STR);
		$result -> execute();

		return $var = ($result->fetchColumn()) ? true : false;
	}
}	
?>