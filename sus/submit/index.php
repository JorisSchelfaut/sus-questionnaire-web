<?php
require_once '../../_data/php/model/database.php';
require_once '../../_data/php/model/questionnaire.php';
require_once '../../_data/php/model/result.php';

$database = new Database();
$result = new Result();
$success = false;
$title = '';

$questionnaire = new Questionnaire();
$questionnaire_id = $_GET['id'];
$database->open_database_connection();
$questionnaire_result = $questionnaire->questionnaire_select_by_id($questionnaire_id);

$row = mysql_fetch_row($questionnaire_result);
$title = $row[2]; // title is the third column
$closed = $row[3]; // closed is the fourth column
$database->close_database_connection();

if ($_POST['action'] == 'insert_result') {
    $database->open_database_connection();
    $result_result = $result->result_insert($_POST['questionnaire_id'],
            $_POST['susq1'], $_POST['susq2'], $_POST['susq3'], $_POST['susq4'],
            $_POST['susq5'], $_POST['susq6'], $_POST['susq7'], $_POST['susq8'],
            $_POST['susq9'], $_POST['susq10']);
    $success = $result_result;
    $database->close_database_connection();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>
            SUS Questionnaire Web App | SUS Questionnaire | <?php echo $title; ?>
        </title>
        <meta name="language" content="english"/>
        <meta name="description" content="sus questionnaire web app"/>
        <meta name="keywords" content="system usability scale questionnaire sus" />
        <link rel="shortcut icon" href="../../_data/img/icon.gif" />
        <link rel="stylesheet" type="text/css" href="../../_data/css/style.css"/>
        <script type="text/javascript" src="../../_data/js/jquery/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="../../_data/js/d3/d3.v3.min.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>SUS Questionnaire Web App</h1>
            <h2>SUS Questionnaire | <?php echo $title; ?></h2>
        </div>
        <div id="navigation">
            <ul>
                <li>
                    <a href="../../">Home</a>
                </li>
                <li>
                    <a href="../../help">Help</a>
                </li>
            </ul>
        </div>
        <div id="content">
<?php if ($success) { ?>
            <p>Your results were successfully submitted.</p>
<?php } else { ?>
            <p>Something went wrong. The results were not submitted.</p>
<?php } ?>
        </div>
        <div id="footer">
            <p>Visit our blog at <a href="http://igchi.wordpress.com/">igchi.wordpress.com</a>.</p>
        </div>
    </body>
</html>