<?php

class cevent extends basecontroller
{
	function __construct()
	{
		parent::__construct();
	}

	function new_event()
	{
		$view = new vevent();
		return new routeinfo($view, 'new_event');
	}

	function new_event_submit()
	{
		$value['type'] = trim($this->form['type']);
		$value['area'] = trim($this->form['area']);
		$value['edate'] = trim($this->form['edate']);
		$value['ename'] = trim($this->form['ename']);
		$value['evenue'] = trim($this->form['evenue']);
		$value['eaddress'] = trim($this->form['eaddress']);
		$value['ezip'] = trim($this->form['ezip']);
		$value['edescription'] = trim($this->form['edescription']);
		$value['eclub'] = trim($this->form['eclub']);

		if(empty($value['type'])) $this->error['type'] = "type required";
		if(empty($value['area'])) $this->error['area'] = "area required";
		if(empty($value['edate'])) $this->error['edate'] = "edate required";
		if(empty($value['ename'])) $this->error['ename'] = "ename required";
		if(empty($value['evenue'])) $this->error['evenue'] = "evenue required";
		if(empty($value['eaddress'])) $this->error['eaddress'] = "eaddress required";
		if(empty($value['ezip'])) $this->error['ezip'] = "ezip required";
		if(empty($value['edescription'])) $this->error['edescription'] = "edescription required";
		if(empty($value['eclub'])) $this->error['eclub'] = "eclub required";
		if(!$this->checkdate($value['edate'])) $this->error['edate'] = "invalid date";
		else $value['date'] = strtotime($value['edate']);

		if(empty($this->error))
		{
			$model = new mevent();
			$id = $model->insert_event($value['type'], $value['area'], $value['edate'], $value['ename'], $value['evenue'], $value['eaddress'], $value['ezip'], $value['edescription'], $value['eclub']);

			$this->form['id'] = $id;
			return $this->view_event();
		}
		else
		{
			$view = new vevent();
			$view->form = $this->form;
			$view->error = $this->error;
			return new routeinfo($view, 'edit_event');
		}
	}

	function view_event()
	{
		$model = new mevent();
		$this->data['event'] = $model->get_event($this->form['id']);

		$view = new vevent();
		$view->data = $this->data;
		return new routeinfo($view, 'view_event');
	}

	function view_events()
	{
		$model = new mevent();
		$this->data['event'] = $model->get_events();

		$view = new vevent();
		$view->data = $this->data;
		return new routeinfo($view, 'view_events');
	}

	function edit_event()
	{
		$model = new mevent();
		$this->data['event'] = $model->get_event($this->form['id']);

		$view = new vevent();
		$view->form = $this->data['event'][0];
		return new routeinfo($view, 'edit_event');
	}

	function edit_event_submit()
	{
		$value['id'] = trim($this->form['id']);
		$value['type'] = trim($this->form['type']);
		$value['area'] = trim($this->form['area']);
		$value['edate'] = trim($this->form['edate']);
		$value['ename'] = trim($this->form['ename']);
		$value['evenue'] = trim($this->form['evenue']);
		$value['eaddress'] = trim($this->form['eaddress']);
		$value['ezip'] = trim($this->form['ezip']);
		$value['edescription'] = trim($this->form['edescription']);
		$value['eclub'] = trim($this->form['eclub']);

		if(empty($value['type'])) $this->error['type'] = "type required";
		if(empty($value['area'])) $this->error['area'] = "area required";
		if(empty($value['edate'])) $this->error['edate'] = "edate required";
		if(empty($value['ename'])) $this->error['ename'] = "ename required";
		if(empty($value['evenue'])) $this->error['evenue'] = "evenue required";
		if(empty($value['eaddress'])) $this->error['eaddress'] = "eaddress required";
		if(empty($value['ezip'])) $this->error['ezip'] = "ezip required";
		if(empty($value['edescription'])) $this->error['edescription'] = "edescription required";
		if(empty($value['eclub'])) $this->error['eclub'] = "eclub required";
		if(!$this->checkdate($value['edate'])) $this->error['edate'] = "invalid date";
		else $value['date'] = strtotime($value['edate']);

		if(empty($this->error))
		{
			$model = new mevent();
			$model->update_event($value['id'], $value['type'], $value['area'], $value['edate'], $value['ename'], $value['evenue'], $value['eaddress'], $value['ezip'], $value['edescription'], $value['eclub']);

			$this->form['id'] = $value['id'];
			return $this->view_event();
		}
		else
		{
			$view = new vevent();
			$view->form = $this->form;
			$view->error = $this->error;
			return new routeinfo($view, 'edit_event');
		}
	}
}

?>