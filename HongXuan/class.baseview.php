<?php

class baseview extends view
{
	public $session;
	public $css;

	function __construct()
	{
		parent::__construct(); // call view's constructor

		$this->css = 'default.css';
		$session = new sessionmanager();
		$this->session = $session->get_user_session();
	}

	function view_info()
	{
		echo '<pre>';
		print_r($this);
		echo '</pre>';
	}
}

?>