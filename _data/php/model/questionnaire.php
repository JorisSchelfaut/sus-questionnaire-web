<?php
require_once 'model.php';
/**
 * Questionnaire class.
 */
class Questionnaire extends Model {
    
    /**
     * <p>Inserts a new record in the <code>questionnaire</code> table.</p>
     * @param String $user_id
     * @param String $title
     * @return boolean
     */
    function questionnaire_insert($user_id, $title) {
        $this->open_database_connection();
        $sql = 'INSERT INTO questionnaire (user_id, title)
                VALUES                    ("' . $user_id . '",
                                           "' . $title . '")';
        $result_sql = mysql_query($sql);
        $this->close_database_connection();
        return $result_sql;
    }
    
    /**
     * @param type $_id
     * @return type
     */
    function questionnaire_delete ($_id) {
        $this->open_database_connection();
        $sql = 'DELETE FROM questionnaire
                WHERE _id = ' . $_id;
        $result_sql = mysql_query($sql);
        $this->close_database_connection();
        return $result_sql;
    }

    /**
     * <p>Select a questionnaire by id.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function questionnaire_select_by_id($_id) {
        $this->open_database_connection();
        $sql = 'SELECT  _id, user_id, title
                FROM    questionnaire AS q
                WHERE   q._id = ' . $_id;
        $result_sql = mysql_query($sql);
        $this->close_database_connection();
        return $result_sql;
    }

    /**
     * <p>Select all questionnaires by a certain user.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function questionnaire_select_all_by_user_id($user_id) {
        $this->open_database_connection();
        $sql = 'SELECT  _id, user_id, title
                FROM    questionnaire AS q
                WHERE   q.user_id = ' . $user_id;
        $result_sql = mysql_query($sql);
        $this->close_database_connection();
        return $result_sql;
    }

    /**
     * <p>Select all the questionnaires from the <code>questionnaire</code> table.</p>
     * @return mysql result
     */
    function questionnaire_select_all() {
        $this->open_database_connection();
        $sql = 'SELECT  _id, user_id, title
                FROM    questionnaire';
        $result_sql = mysql_query($sql);
        $this->close_database_connection();
        return $result_sql;
    }
}
?>
