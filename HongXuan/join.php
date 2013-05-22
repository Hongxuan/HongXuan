<?php
require_once('config.php');
$session = new sessionmanager();
$session->route(new cuser(), 'join', false);
?>