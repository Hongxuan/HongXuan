<?php

////////////////////////////////////////////////////////////////////////////////
// database class provides interface for all database operations
class database
{
	public static $mysqli = null;
	
	function __construct()
	{
		// connect if not connected
		if(self::$mysqli == null)
		{
			self::$mysqli = new mysqli("localhost", DB_USER, DB_PASS, DB_DATABASE);
			if(self::$mysqli->connect_error)
			{
				die("Connect Error (". $self::$mysqli->connect_errno .")" . self::$mysqli->connect_error);
			}
		}
	}
	
	function fetch_array($result)
	{    
		$array = array();

		while($row = $result->fetch_assoc())
			$array[] = $row;

		return $array;
	}

	function format($query)
	{
		return str_replace("?", "'%s'", $query);
	}
}

?>