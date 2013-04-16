<?php
require_once 'database.php';
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
        $sql = 'INSERT INTO questionnaire (user_id, title)
                VALUES                    ("' . $user_id . '",
                                           "' . $title . '")';
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
    
    /**
     * @param type $_id
     * @param type $user_id
     * @return type
     */
    function questionnaire_delete ($_id, $user_id) {
        $sql = 'DELETE FROM questionnaire
                WHERE _id = ' . $_id .'
                AND   user_id = ' . $user_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
    
    /**
     * @param type $_id
     * @param type $user_id
     * @return type
     */
    function questionnaire_close ($_id, $user_id) {
        $sql = 'UPDATE  questionnaire
                SET     closed = 1
                WHERE   _id = ' . $_id .'
                AND     user_id = ' . $user_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
    
    /**
     * @param type $_id
     * @param type $user_id
     * @return type
     */
    function questionnaire_open ($_id, $user_id) {
        $sql = 'UPDATE  questionnaire
                SET     closed = 2
                WHERE   _id = ' . $_id .'
                AND     user_id = ' . $user_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select a questionnaire by id.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function questionnaire_select_by_id($_id) {
        $sql = 'SELECT  q._id AS id, q.user_id AS user, q.title AS title, q.closed AS closed
                FROM    questionnaire AS q
                WHERE   q._id = ' . $_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select all questionnaires by a certain user.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function questionnaire_select_all_by_user_id($user_id) {
        $sql = 'SELECT  q._id, q.user_id, q.title, q.closed AS closed
                FROM    questionnaire AS q
                WHERE   q.user_id = ' . $user_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select all the questionnaires from the <code>questionnaire</code> table.</p>
     * @return mysql result
     */
    function questionnaire_select_all() {
        $sql = 'SELECT  q._id, q.user_id, q.title, q.closed AS closed
                FROM    questionnaire AS q';
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
}
?>
