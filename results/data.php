<?php
require_once '../_data/php/model/database.php';
require_once '../_data/php/model/questionnaire.php';

$total = array();
$q1 = array();
$q2 = array();
$q3 = array();
$q4 = array();
$q5 = array();
$q6 = array();
$q7 = array();
$q8 = array();
$q9 = array();
$q10 = array();

$database = new Database();
$result = new Result();
$questionnaire = new Questionnaire();
$questionnaire_id = $_GET['id'];

$database->open_database_connection();
$questionnaire_result = $result->result_select_all_by_questionnaire_id($questionnaire_id);
$database->close_database_connection();


// OUTPUT : 'boxplot_nr result_index value'

?>
