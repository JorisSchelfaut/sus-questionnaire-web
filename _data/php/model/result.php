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
        $score = $this->calculate_score($q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10);
        $sql = 'INSERT INTO result (questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, score)
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
                                    "' . $q10 . '",
                                    "' . $score . '")';
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
    
    /**
     * Each item's score contribution will range from 0 to 4. For items 
     * 1,3,5,7,and 9 the score contribution is the scale position minus 1. 
     * For items 2,4,6,8 and 10, the contribution is 5 minus the scale 
     * position. Multiply the sum of the scores by 2.5 to obtain the overall
     * value of SU.
     * @param type $q1
     * @param type $q2
     * @param type $q3
     * @param type $q4
     * @param type $q5
     * @param type $q6
     * @param type $q7
     * @param type $q8
     * @param type $q9
     * @param type $q10
     * @return type
     */
    private function calculate_score($q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10) {
        return (($q1 - 1) + (5 - $q2) + ($q3 - 1) + (5 - $q4)
                + ($q5 - 1) + (5 - $q6) + ($q7 - 1) + (5 - $q8)
                + ($q9 - 1) + (5 - $q10)) * 2.5;
    }

    /**
     * <p>Select a result by id.</p>
     * @param   integer $_id
     * @return  mysql result
     */
    function result_select_by_id($_id) {
        $sql = 'SELECT  _id, questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10
                FROM    result
                WHERE   _id = ' . $_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select a result by questionnaire id.</p>
     * @param   integer $questionnaire_id
     * @return  mysql result
     */
    function result_select_all_by_questionnaire_id($questionnaire_id) {
        $sql = 'SELECT  _id AS id, questionnaire_id AS q_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, score
                FROM    result
                WHERE   questionnaire_id = ' . $questionnaire_id;
        $result_sql = mysql_query($sql);
        return $result_sql;
    }

    /**
     * <p>Select all the users from the <code>result</code> table.</p>
     * @return mysql result
     */
    function result_select_all() {
        $sql = 'SELECT  _id, questionnaire_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, score
                FROM    result';
        $result_sql = mysql_query($sql);
        return $result_sql;
    }
}
?>
