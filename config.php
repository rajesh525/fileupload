<?php
 
 	class DbConfig{

 		/*database connection */
		private $conn; 

		function __construct(){

		}


		function connect(){

			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', '');
			define('DB_HOST', 'localhost');
			define('DB_NAME', 'fileupload');

			$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("could not connect");

			return $conn;
		}


 	}