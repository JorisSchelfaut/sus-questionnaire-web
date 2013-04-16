<?php
$connection;
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//'P9KWRVmtKYf4ZefQ';
$dbname = 'susquestionnaires';

/**
 * Description of Database
 *
 * @author Joris Schelfaut
 */
class Database {
    /**
     * Open the database connection.
     */
    public function open_database_connection() {
        global $connection, $dbhost, $dbname, $dbpass, $dbuser;
        $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die('Could not connect to MySQL: ' . mysql_error());
        mysql_select_db($dbname);
    }
    
    /**
     * Close the database connection.
     */
    public function close_database_connection() {
        global $connection;
        mysql_close($connection);
    }
}

?>
