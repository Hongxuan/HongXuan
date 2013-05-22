<?php

class vuser extends baseview
{
	function __construct()
	{
		parent::__construct();
	}

	function join()
	{
		include('tpl-join.php');
	}

	function login()
	{
		include('tpl-login.php');
	}

	function edit_user()
	{
		// grab area and type selection from database
		$model = new muser();
		$this->data['types'] = $model->get_types();
		$this->data['areas'] = $model->get_areas();

		include('tpl-edit-user.php');
	}
}

?>