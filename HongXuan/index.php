<?php
require_once("config.php");
$session = new sessionmanager();
$session->route(new cuser(), 'login', false);
?>