<?php
/* 
 * Provides a set of functions to communicate with the database.
 */

$connection;

function open_database_connection() {
    include('config.php');
    global $connection;
    $connection = mysql_connect($dbhost, $dbuser, $dbpass)
            or die('Could not connect to MySQL: ' . mysql_error());
    mysql_select_db($dbname);
}

function close_database_connection() {
    include('config.php');
    global $connection;
    mysql_close($connection);
}

?>
