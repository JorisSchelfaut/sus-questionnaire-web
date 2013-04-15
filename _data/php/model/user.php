<?php
require 'model.php';
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
        $salt = 'igCHI';
        $password = hash('sha256', $password . $salt);
        $this->open_database_connection();
        $sql = 'INSERT INTO user (username, emailaddress, password)
                VALUES           ("' . $user_name . '",
                                  "' . $email_address . '",
                                  "' . $password . '")';
        $result = mysql_query($sql);
        $this->close_database_connection();
        return $result;
    }

    /**
     * <p>Select a user by id.</p>
     * @param   integer $_id
     * @return  [array['_id'], array['username'], array['emailaddress'], array['password']]
     */
    public function user_select_by_id($_id) {
        $this->open_database_connection();
        $sql = 'SELECT  _id, username, emailaddress, password
                FROM    user u
                WHERE   u._id = ' . $_id;
        $result = mysql_query($sql);
        $this->close_database_connection();
        return $result;
    }

    /**
     * <p>Select a user by password and e-mail address combination.</p>
     * @param type $email_address
     * @param type $password
     * @return [array['_id']]
     */
    public function user_select_by_credentials($email_address, $password) {
        $salt = 'igCHI';
        $password = hash('sha256', $password . $salt);
        $this->open_database_connection();
        $sql = 'SELECT  _id
                FROM    user u
                WHERE   u.emailaddress = ' . $email_address . '
                AND     u.password = ' . $password;
        $result = mysql_query($sql);
        $this->close_database_connection();
        return $result;
    }

    /**
     * <p>Select all the users from the <code>user</code> table.</p>
     * @return mysql result
     */
    public function user_select_all() {
        $this->open_database_connection();
        $sql = 'SELECT  username, emailaddress, password
                FROM    user';
        $result = mysql_query($sql);
        $this->close_database_connection();
        return $result;
    }
}
?>
