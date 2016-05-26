<?php
    class DbConnect{

		
		/* accessing files  data from database */
		private $conn;
		function __construct(){

			include("config.php");
			$db=new Dbconfig();
			$this->conn=$db->connect();
		}

		public function getData(){

            $data=mysqli_query($this->conn,"select * from files") or die('could not retrive data');
            return $data;

		}  

		/* inserting file data into database */

		public function putData($name,$mime,$size){

			
			$data=mysqli_query($this->conn,"INSERT INTO files(name,mime,size,created_at)VALUES('$name', '$mime', $size, NOW())");
			return $data;
		}

}

?>
