<?php

class routeinfo
{
	public $view;
	public $method;

	function routeinfo($view, $method)
	{
		$this->view = $view;
		$this->method = $method;
	}

	/* additional functionality removed for easy understanding */
}

?>