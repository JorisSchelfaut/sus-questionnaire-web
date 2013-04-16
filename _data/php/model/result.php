<?php
require_once 'database.php';
require_once 'model.php';
/**
 * Result class.
 */
class Result extends Model {
    
    /**
     * <p>Inserts a new record in the <code>result</code> table.</p>
     * @return Boolean
     */
    function result_insert($questionnaire_id, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10) {
        $sql = 'INSERT INTO result (questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10)
                VALUES             ("' . $questionnaire_id . '",
                                    "' . $q1 . '",
                                    "' . $q2 . '",
                                    "' . $q3 . '",
                                    "' . $q4 . '",
                                    "' . $q5 . '",
                                    "' . $q6 . '",
                                    "' . $q7 . '",
                                    "' . $q8 . '",
                                    "' . $q9 . '",
                                    "' . $q10 . '")';
        echo $sql;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select a result by id.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function result_select_by_id($_id) {
        $sql = 'SELECT  _id, questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10
                FROM    result AS r
                WHERE   r._id = ' . $_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select a result by questionnaire id.</p>
     * @param   integer $questionnaire_id
     * @return  mysql result
     */
    function result_select_all_by_questionnaire_id($questionnaire_id) {
        $sql = 'SELECT  _id, questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10
                FROM    result AS r
                WHERE   r.questionnaire_id = ' . $questionnaire_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select all the users from the <code>result</code> table.</p>
     * @return mysql result
     */
    function result_select_all() {
        $sql = 'SELECT  _id, questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10
                FROM    result';
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
}
?>
