<?php 

/**
 * 
 */
class gen 
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'yourhomefuto';
	function __construct()
	{
		$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
	}

	public function query($sql)
	{
			$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			$q = mysqli_query($conn,$sql);
			return $q;		
}
public function num($query)
{
		$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		$q = mysqli_query($conn,$query);		
		$rowcount = mysqli_num_rows($q);
		return $rowcount;	

}

public function fetch($value)
{
$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		$q = mysqli_query($conn,$value);		
		$array = mysqli_fetch_assoc($q);	
return $array;
}
}

 ?>