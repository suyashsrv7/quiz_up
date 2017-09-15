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
		var $id;
		var $scrname;
		var $firstname;
		var $lastname;
		var $image;
		var $password;
		var $email;
		var $badge_id;
		var $xp;
		var $badge;

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
				else if($key == "id")
					$this->id=$value;
				else if($key == "badge_id")
					$this->badge_id=$value;
				else if($key == "xp")
					$this->xp=$value;
				else if($key == "badge")
					$this->badge=$value;
			}
		}
	}
	function run_query($query)
	{
		global $conn;
		$result = $conn->query($query);

        if($result && $result->num_rows != 0)
		{
			$row = $result->fetch_assoc();
			return $row;//all variables are stored in $gett->
        }
        else
        {
        	return false;
        }
	}

?>