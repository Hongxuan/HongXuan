<?php

// database connection information
define("DB_DATABASE", "organizer");
define("DB_USER", "root");
define("DB_PASS", "Redbull25");

// security salt for password hashing
// define("CRYPTO_SALT", 'tm4xtt>~o8mnx_Qmkq}/NZ{N)>R6n/t}YLNMrk@');

// // template configuration and selection
// define("TEMPLATE_PATH", "template");
// define("THEME_DEFAULT", "default");
// define("THEME_ACTIVE", "default");

// configure the class file naming definition
// for __autoload function
function autoload($class)
{
	require(sprintf('class.%s.php', $class));
}
spl_autoload_register('autoload');
?>