<?php

class controller extends app
{
	function __construct()
	{

		parent::__construct(); // call app's contructor

		if(!empty($_POST)) $this->form = $_POST;
		else if(!empty($_GET)) $this->form = $_GET;
	}

	/* additional functionality removed for easy understanding */
}

?>