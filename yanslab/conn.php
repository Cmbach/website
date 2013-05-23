<?php

$mysql_error = "Could not connect";

$mysql_host = "kevinxisdb.db.9225106.hostedresource.com";
$mysql_user = "kevinxisdb";
$mysql_pass = "Minh@0x1";

$mysql_db = "kevinxisdb";
/*
$mysql_host = 'kev1213907233071.db.9225106.hostedresource.com';					// This is normally set to localhost
$mysql_user = 'kev1213907233071';							// DB username
$mysql_pass = 'J00joomla';						// DB password
$mysql_db = 'kev1213907233071';
*/
mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die($mysql_error);
mysql_select_db($mysql_db) or die($mysql_error);
