<?php
require_once 'model.php';
/**
 * User class.
 */
class User extends Model {

    /**
     * <p>Inserts a new record in the <code>user</code> table.</p>
     * @param String $email_address
     * @param String $user_name
     * @param String $password
     * @return Boolean
     */
    public function user_insert($email_address, $user_name, $password) {
        $email_address = mysql_real_escape_string($email_address);
        $user_name = mysql_real_escape_string($user_name);
        $password = mysql_real_escape_string($password);
        $salt = 'igCHI';
        $password = hash('sha256', $password . $salt);
        $sql = 'INSERT INTO user (username, emailaddress, password)
                VALUES           ("' . $user_name . '",
                                  "' . $email_address . '",
                                  "' . $password . '")';
        $result = mysql_query($sql);
        return $result;
    }

    /**
     * <p>Select a user by id.</p>
     * @param   integer $_id
     * @return  [array['_id'], array['username'], array['emailaddress'], array['password']]
     */
    public function user_select_by_id($_id) {
        $_id = mysql_real_escape_string($_id);
        $sql = 'SELECT  _id, username, emailaddress, password
                FROM    user AS u
                WHERE   u._id = ' . $_id;
        $result = mysql_query($sql);
        return $result;
    }

    /**
     * <p>Select a user by password and e-mail address combination.</p>
     * @param type $email_address
     * @param type $password
     * @return [array['_id']]
     */
    public function user_select_by_credentials($email_address, $password) {
        $email_address = mysql_real_escape_string($email_address);
        $password = mysql_real_escape_string($password);
        $salt = 'igCHI';
        $password = hash('sha256', $password . $salt);
        $sql = 'SELECT  _id
                FROM    user AS u
                WHERE   u.emailaddress = "' . $email_address . '"
                AND     u.password = "' . $password . '"';
        $result = mysql_query($sql);
        return $result;
    }

    /**
     * <p>Select all the users from the <code>user</code> table.</p>
     * @return mysql result
     */
    public function user_select_all() {
        $sql = 'SELECT  username, emailaddress, password
                FROM    user';
        $result = mysql_query($sql);
        return $result;
    }
}
?>
