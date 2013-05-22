<?php

class vevent extends baseview
{
	function __construct()
	{
		parent::__construct();
	}

	function new_event()
	{
		include('tpl-new-event.php');
	}

	function view_event()
	{
		include('tpl-view-event.php');
	}

	function view_events()
	{
		include('tpl-view-events.php');
	}

	function edit_event()
	{
		include('tpl-edit-event.php');
	}
}

?>