<?php
require('config.php');
$session = new sessionmanager();
$session->route(new cevent(), 'view_event');
?>