<?php
require_once '../_data/php/model/database.php';
require_once '../_data/php/model/questionnaire.php';
require_once '../_data/php/model/result.php';

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
$questionnaire_result = $result->result_select_all_by_questionnaire_id($questionnaire_id, 'SORT BY 2');

$arrayData = array('items' => array());
if (!$questionnaire_result) {
    $database->close_database_connection();
    die('Could not successfully run query ($sql) from DB: ' . mysql_error());
} else {
    while ($rowAssoc = mysql_fetch_assoc($questionnaire_result)) {
        $arrayData['items'][] = $rowAssoc;
    }
    $database->close_database_connection();
}


// OUTPUT : 'boxplot_nr result_index value'
$i = 0;
$j = 0;
$last_qid = 0;

echo 'Expt,Run,Score' . "\n";

foreach ($arrayData['items'] as $value) {
    if ($last_qid != $value['q_id']) {
        $last_qid = $value['q_id'];
        $j++;
        $i = 0;
    } else {
        $i++;
    }
    echo '' . $j . ' ' . $i . ' ' . $value['score'] . "\n";
}
?>
