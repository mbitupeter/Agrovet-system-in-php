<?php

class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "agrovet_db");
		return $this->con;
	}
}

?>