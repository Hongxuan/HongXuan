<?php

class muser extends database
{
	function __construct()
	{
		parent::__construct();
	}

	function get_user($id)
	{
		$query = "SELECT * FROM clubs WHERE id=$id";
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function authenticate_user($username, $password)
	{
		// $query = $this->format("SELECT * FROM clubs WHERE login=? AND password=?");
		// $query = sprintf($query, $username, $password);
		// $result = self::$mysqli->query($query);
		// return $this->fetch_array($result);

		return true;
	}

	function insert_user($username, $password)
	{
		$query = $this->format("INSERT INTO clubs (login, password) VALUES (?, ?)");
		$query = sprintf($query, $username, $password);
		self::$mysqli->query($query);
	}

	function get_types()
	{
		$query = "SELECT * FROM types";
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function get_areas()
	{
		$query = "SELECT * FROM areas";
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function update_user($id, $name, $email, $description, $area, $type)
	{
		$query = $this->format("UPDATE clubs SET name=?, email=?, description=?, area=?, type=? WHERE id=?");
		$query = sprintf($query, $name, $email, $description, $area, $type, $id);
		self::$mysqli->query($query);
	}
}

?>