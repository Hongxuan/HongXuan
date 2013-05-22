<?php

class mevent extends database
{
	function __construct()
	{
		parent::__construct();
	}

	function get_events()
	{
		$query = "SELECT * FROM events ORDER BY edate ASC";
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function get_events_by_user($eclub)
	{
		$query = $this->format("SELECT * FROM events WHERE eclub=? ORDER BY edate ASC");
		$query = sprintf($query, $eclub);
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function get_event($id)
	{
		$query = $this->format("SELECT * FROM events WHERE id=? LIMIT 1");
		$query = sprintf($query, $id);
		$result = self::$mysqli->query($query);
		return $this->fetch_array($result);
	}

	function insert_event($type, $area, $edate, $ename, $evenue, $eaddres, $ezip, $edescription, $eclub)
	{
		$query = $this->format("INSERT INTO events (type, area, edate, ename, evenue, eaddress, ezip, edescription, eclub) VALUES (?,?,?,?,?,?,?,?,?)");
		$query = sprintf($query, $type, $area, $edate, $ename, $evenue, $eaddres, $ezip, $edescription, $eclub);
		$result = self::$mysqli->query($query);
		return self::$mysqli->insert_id;
	}

	function delete_event($id)
	{
		$query = $this->format("DELETE FROM events WHERE id=?");
		$query = sprintf($query, $id);
		$result = self::$mysqli->query($query);
	}

	function update_event($id, $type, $area, $edate, $ename, $evenue, $eaddres, $ezip, $edescription)
	{
		$query = $this->format("UPDATE events SET type=?, area=?, edate=?, ename=?, evenue=?, eaddress=?, ezip=?, edescription=? WHERE id=?");
		$query = sprintf($query, $type, $area, $edate, $ename, $evenue, $eaddres, $ezip, $edescription, $id);
		$result = self::$mysqli->query($query);
	}
}

?>