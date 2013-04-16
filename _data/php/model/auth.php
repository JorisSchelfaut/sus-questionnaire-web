<?php
require_once 'database.php';
require_once 'user.php';
/**
 * Description of Auth
 *
 * @author JORIS
 */
class Auth {

    /**
     * @param type $email_address
     * @param type $password
     * @return boolean
     */
    function login($email_address, $password) {
        $user = new User();
        $_id = 0;
        $result = $user->user_select_by_credentials($email_address, $password);
        if (!$result) {
            echo ('Could not successfully run query ($sql) from DB: ' . mysql_error());
            return false;
        } else {
            $row = mysql_fetch_row($result);
            $_id = $row[0]['_id'];
            $_SESSION['USER'] = $_id;
            return true;
        }
    }

    /**
     * @param type $email_address
     * @param type $password
     * @param type $username
     * @return boolean
     */
    function register($email_address, $password, $username) {
        $user = new User();
        $_id = 0;
        $result = $user->user_insert($email_address, $username, $password);
        if (!$result) {
            echo ('Could not successfully run query ($sql) from DB: ' . mysql_error());
            return false;
        } else {
            $_id = mysql_insert_id();
            $_SESSION['USER'] = $_id;
            return true;
        }
    }

    /**
     * @return boolean
     */
    function logout() {
        return !session_destroy();
    }
}

?>
