<?php
require_once('config.php');

$database = new database();

//*****************************************
echo "creating clubs table: ";
$query = "create table clubs (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50),
	type CHAR(3),
	area CHAR(3),
	email VARCHAR( 50 ),
	description BLOB,
	login VARCHAR(8),
	password VARCHAR(8)
)";
$result = database::$mysqli->query($query);
if(!$result) echo "error creating table<br/>";
else echo "OK<br/>";
//*****************************************

//*****************************************
echo "creating events table: ";
$query = "create table events(
		id INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY( id ),
		type CHAR(3),
		area CHAR(3),
		edate INT,
		ename VARCHAR(100),
		evenue VARCHAR(100),
		eaddress VARCHAR( 255 ),
		ezip VARCHAR(20),
		edescription BLOB,
		eclub INT NOT NULL
);";
$result = database::$mysqli->query($query);
if(!$result) echo "error creating table<br/>";
else echo "OK<br/>";
//*****************************************

//*****************************************
echo "creating areas table: ";
$query = "create table areas( id CHAR(3), area VARCHAR( 30 ) )";
$result = database::$mysqli->query($query);
if(!$result) echo "error creating table<br/>";
else echo "OK<br/>";
//*****************************************

//*****************************************
echo "creating types table: ";
$query = "create table types( id CHAR(3), type VARCHAR( 30 ) )";
$result = database::$mysqli->query($query);
if(!$result) echo "error creating table<br/>";
else echo "OK<br/>";
//*****************************************

//*****************************************
echo "inserting types: ";
$query = "TRUNCATE types";
$result = database::$mysqli->query($query);
$query = "REPLACE INTO types ( id, type ) VALUES
	('COM', 'Community'),
	('SOC', 'Social'),
	('MUS', 'Music'),
	('FAM', 'Family')";
$result = database::$mysqli->query($query);
if(!$result) echo "error inserting values<br/>";
else echo "OK<br/>";
//*****************************************

//*****************************************
echo "inserting areas: ";
$query = "TRUNCATE areas";
$result = database::$mysqli->query($query);
$query = "REPLACE INTO areas ( id, area ) VALUES
	('NOR', 'North'),
	('SOU', 'South'),
	('EAS', 'East'),
	('WES', 'West')";
$result = database::$mysqli->query($query);
if(!$result) echo "error inserting values<br/>";
else echo "OK<br/>";
//*****************************************

?>