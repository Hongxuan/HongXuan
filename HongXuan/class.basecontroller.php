<?php

class basecontroller extends controller
{
	function __construct()
	{
		parent::__construct(); // call controller's contructor
	}

	function login()
	{
		$session = new sessionmanager();
		$session->destroy_user_session();

		return new routeinfo(new vuser(), 'login');
	}

	function checkdate($datestring)
	{
		$time = strtotime($value['edate']);
		if($time == null) return false;

		if(checkdate(date('m', $time), date('j', $time), date('Y', $time)))
		{
			return true;
		}
	}

}

?>