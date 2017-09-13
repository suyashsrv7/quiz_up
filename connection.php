<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="quiz_up";

	$conn=new mysqli($servername,$username,$password,$dbname);//opens a new connection to mySQL

	if($conn->connect_error)
		die("Connection Failed". $conn->connect_error);// prints a message and exits the current script

	Class get_value
	{
		var $scrname;
		var $firstname;
		var $lastname;
		var $image;
		var $password;
		var $email;

		public function get($row)
		{
			foreach ($row as $key => $value) 
			{
				if($key == "firstname")
					$this->firstname=$value;
				else if($key == "lastname")
					$this->lastname=$value;
				else if($key == "scrname")
					$this->scrname=$value;
				else if ($key == "password")
					$this->password=$value;
				else if($key == "email")
					$this->email=$value;
				else if($key == "image")
					$this->image=$value;
			}
		}
	}

?>