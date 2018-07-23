<?php
 	

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "yourhomefuto";


$conn = mysqli_connect($dbhost ,$dbuser, $dbpassword, $dbname);


class dboriented 
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'yourhomefuto';

	function __construct()
	{
		$conn = $this->connectDB();
		// if(!empty($conn)) {
		// 	$this->selectDB($conn);
		// }
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		// return $conn;
if (!$conn) {
		echo "error";
	}
	
	}
	
}


