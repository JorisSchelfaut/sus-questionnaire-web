<?php
require_once '../_data/php/model/database.php';
require_once '../_data/php/model/questionnaire.php';

$database = new Database();
$questionnaire = new Questionnaire();
$questionnaire_id = $_GET['id'];
$database->open_database_connection();
$questionnaire_result = $questionnaire->questionnaire_select_by_id($questionnaire_id);

$row = mysql_fetch_row($questionnaire_result);
$title = $row[2]; // title is the third column
$closed = $row[3]; // closed is the fourth column
$database->close_database_connection();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>
            SUS Questionnaire Web App | Results | <?php echo $title; ?>
        </title>
        <meta name="language" content="english"/>
        <meta name="description" content="sus questionnaire web app"/>
        <meta name="keywords" content="system usability scale questionnaire sus" />
        <link rel="shortcut icon" href="../_data/img/icon.gif" />
        <link rel="stylesheet" type="text/css" href="../_data/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../_data/css/boxplot.css"/>
        <script type="text/javascript" src="../_data/js/jquery/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="../_data/js/d3/d3.v3.min.js"></script>
        <script type="text/javascript" src="../_data/js/purl/purl.js"></script>
        <script type="text/javascript" src="../_data/js/infovis/infovis.boxplot.js"></script>
        <script type="text/javascript" src="../_data/js/results.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>SUS Questionnaire Web App</h1>
            <h2>Results | <?php echo $title; ?></h2>
        </div>
        <div id="navigation">
            <ul>
                <li>
                    <a href="../">Home</a>
                </li>
                <li>
                    <a href="../help/">Help</a>
                </li>
            </ul>
        </div>
        <div id="content">
        <!--
            TOTAL AVG SCORE + BOX PLOT
            AVG SCORE / QUESTION + BOX PLOT
        -->
        </div>
        <div id="footer">
            <p>Visit our blog at <a href="http://igchi.wordpress.com/">igchi.wordpress.com</a>.</p>
        </div>
    </body>
</html>