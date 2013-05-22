<?php

class sessionmanager
{
	function __construct()
	{
		// start session if not already started
		if(session_id() == '') session_start();
	}

	function is_user_session_valid()
	{
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])) return true;
		else return false;
	}

	function create_user_session($id, $username)
	{
		$_SESSION['user']['id'] = $id;
		$_SESSION['user']['username'] = $username;
	}

	function destroy_user_session()
	{
		unset($_SESSION['user']);
	}

	function get_user_session()
	{
		return $_SESSION['user'];
	}

	function route($controller, $method, $auth = true)
	{
		if($auth === false || $this->is_user_session_valid())
		{
			// get the returned controller routeinfo
			$routeinfo = $controller->$method();
			$m = $routeinfo->method;
			$routeinfo->view->$m();
		}
		else
		{
			$this->destroy_user_session();

			// default to login form
			$this->route(new basecontroller(), 'login', false);
		}
	}

	/* additional functionality removed for easy understanding */
}

?>
