<?php

class cuser extends basecontroller
{
	function __construct()
	{
		parent::__construct(); // call basecontroller's contructor
	}

	function join()
	{
		$view = new vuser();
		return new routeinfo($view, 'join');
	}

	function join_submit()
	{
		$value['username'] = trim($this->form['username']);
		$value['password'] = trim($this->form['password']);
		$value['password_again'] = trim($this->form['password_again']);

		if(empty($value['username'])) $this->error['username'] = "username required";
		if(empty($value['password'])) $this->error['password'] = "password required";
		if(empty($value['password_again'])) $this->error['password_again'] = "retype password";
		if($value['password'] != $value['password_again']) $this->error['password_again'] = "password mismatch";

		if(empty($this->error))
		{
			$model = new muser();
			$model->insert_user($value['username'], $value['password']);

 			// clear the form and repopulate with new login values
			return $this->login_submit();
		}
		else
		{
			$view = new vuser();
			$view->form = $this->form;
			$view->error = $this->error;
			return new routeinfo($view, 'join');
		}
	}

	function login_submit()
	{
		$value['username'] = trim($this->form['username']);
		$value['password'] = trim($this->form['password']);

		$model = new muser();
		$user = $model->authenticate_user($value['username'], $value['password']);
		if(empty($user))
		{
			$this->error['password'] = "invalid user and/or password";

			$view = new vuser();
			$view->form = $this->form;
			$view->error = $this->error;
			return new routeinfo($view, 'login');
		}
		else
		{
			// sign in the user by creating the user session
			$session = new sessionmanager();
			$session->create_user_session($user[0]['id'], $user[0]['login']);

			return $this->edit_user();
		}
	}

	function edit_user()
	{
		$session = new sessionmanager();
		$user = $session->get_user_session();

		$model = new muser();
		$this->data['user'] = $model->get_user($user['id']);

		$view = new vuser();
		$view->form = $this->data['user'][0];
		return new routeinfo($view, 'edit_user');
	}

	function edit_user_submit()
	{
		$value['name'] = trim($this->form['name']);
		$value['email'] = trim($this->form['email']);
		$value['description'] = trim($this->form['description']);
		$value['area'] = trim($this->form['area']);
		$value['type'] = trim($this->form['type']);

		if(empty($value['name'])) $this->error['name'] = "name required";
		if(empty($value['email'])) $this->error['email'] = "email required";
		if(empty($value['description'])) $this->error['description'] = "description required";
		if(empty($value['area'])) $this->error['area'] = "area required";
		if(empty($value['type'])) $this->error['type'] = "type required";

		if(empty($this->error))
		{
			$session = new sessionmanager();
			$user = $session->get_user_session();
			$model = new muser();
			$model->update_user($user['id'],$value['name'],$value['email'],$value['description'],$value['area'],$value['type']);

			return $this->edit_user();
		}
		else
		{
			$view = new vuser();
			$view->error = $this->error;
			$view->form = $this->form;
			return new routeinfo($view, 'edit_user');
		}
	}
}

?>