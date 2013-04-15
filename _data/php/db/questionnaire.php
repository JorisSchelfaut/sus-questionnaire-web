<?php

/**
 * <p>Inserts a new record in the <code>questionnaire</code> table.</p>
 * @param String $email_address
 * @param String $user_name
 * @param String $password
 * @return Boolean
 */
function questionnaire_insert($email_address, $user_name, $password) {
    include('../config/database.php');
    open_database_connection();
    $sql = 'INSERT INTO user (username, emailaddress, password)
            VALUES           ("' . $user_name . '",
                              "' . $email_address . '",
                              "' . $password . '")';
    $result_sql = mysql_query($sql);
    close_database_connection();
    return $result_sql;
}

/**
 * <p>Select a user by id.</p>
 * @param   integer $_id
 * @return  mysql result
 */
function questionnaire_select_by_id($_id) {
    include('../config/database.php');
    open_database_connection();
    $sql = 'SELECT  username, emailaddress, password
            FROM    user u
            WHERE   u.id = ' . $_id;
    $result_sql = mysql_query($sql);
    close_database_connection();
    return $result_sql;
}

/**
 * <p>Select a user by id.</p>
 * @param   integer $_id
 * @return  mysql result
 */
function questionnaire_select_all_by_user_id($user_id) {
    include('../config/database.php');
    open_database_connection();
    $sql = 'SELECT  username, emailaddress, password
            FROM    user u
            WHERE   u.id = ' . $user_id;
    $result_sql = mysql_query($sql);
    close_database_connection();
    return $result_sql;
}

/**
 * <p>Select all the users from the <code>user</code> table.</p>
 * @return mysql result
 */
function questionnaire_select_all() {
    include('../config/database.php');
    open_database_connection();
    $sql = 'SELECT  username, emailaddress, password
            FROM    user';
    $result_sql = mysql_query($sql);
    close_database_connection();
    return $result_sql;
}



?>
