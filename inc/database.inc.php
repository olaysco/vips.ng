<?php

require_once 'config.inc.php';
require_once 'User.class.php';

class Database{

	private $connection;
	private $rowCount;
	public $singleField;


	/**
	 * creates database object 
	 * an initializes the connection 
	 * 
	 * @param none 
	 */
	public function __construct(){
		try{
			$this->connection = new PDO('mysql:host='.DBHOST.';port='.DBPORT.';dbname='.DBNAME,DBUSER,DBPASS);
		}
			catch(PDOException $e){
			echo "Connection error".$e->getMessage();
		}
	}

	/**
	 * This function executes any sql query
	 * @param string $sql
	 * @param array $array
	 * 
	 * @return 
	 */
	private function query($sql,$array){
		$this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
		try{
		$result = $this->connection->prepare($sql);
			if(!$result){
				var_dump($this->connection->errorInfo());
			}
			
			if(!$result->execute(array_values($array)))
			{
				//echo 'failed';
			}
			
			$this->setRowCount($result->rowCount());
				
			}
			catch (Exception $e){
				echo $e->getMessage();
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		return $result;
	
	}

	/**
	 * returns the numbers of row affected
	 * by recent sql operation
	 * 
	 * @param null
	 * @return int rowCount
	 */
	public function getRowCount(){
		return $this->rowCount;
	}
	
	/**
	 * Sets row affected property
	 * 
	 * @param int $count
	 * @return null;
	 */
	public function setRowCount($count){
		$this->rowCount = $count;
	}

	/**
	 * method to perform user registration
	 * @param array[]
	 */
	public function register($registration_details){
		$sql = '
		INSERT INTO `vips`.`user` (`full_name`, `hear_about`, `email`, `phone_number`, `password`, `referral_code`)
				 VALUES (?, ?, ?, ?, ?, ?)';
		$values['full_name'] =  $registration_details['full_name'] ?? '';
		$values['hear_about'] =  $registration_details['hear_about'] ?? '';
		$values['email'] =  $registration_details['email'] ?? '';
		$values['phone_number'] =  $registration_details['phone_number'] ?? '';
		$values['password'] =  $registration_details['password'] ?? '';
		$values['referral_code'] =  $registration_details['referral_code'] ?? '';

		$this->query($sql, $values);
		if($this->getRowCount()>0){
			return 'successfully registered';
		}else {
			return 'registration failed';
		}
	}

	/**
	 * method to perform user registration
	 * @param array $login_details
	 * 
	 * @return int user_id
	 */
	public function login($login_details){
		$sql = 'SELECT `id` FROM `user` WHERE `email` like ? AND `password` like ?';
		$values['email'] = $login_details['email'];
		$values['password'] = $login_details['password'];
		$result = $this->query($sql, $values);

		if($this->getRowCount()>0){
			return $result->fetchAll();
		}else {
			return false;
		}

	}

	/**
	 * method to fetch user details from database
	 * @param int user_id
	 * 
	 */
	public function  fetchUser($user_id){
		$sql = 'SELECT * FROM `user` WHERE `id` = ?';
		$values['id'] = $user_id;
		$result = $this->query($sql,$values);
		if($this->getRowCount()>0){
			$result = $result->fetchAll();
			$user = new User($result[0]['id'], $result[0]['full_name'], $result[0]['hear_about'], 
			$result[0]['email'], $result[0]['phone_number'], $result[0]['referral_code']);
			return $user;
		}else {
			return false;
		}
	}

}



?>
