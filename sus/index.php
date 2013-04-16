<?php
require_once '../_data/php/model/database.php';
require_once '../_data/php/model/questionnaire.php';

$database = new Database();
$questionnaire = new Questionnaire();
$questionnaire_id = $_GET['id'];
$database->open_database_connection();
$questionnaire_result = $questionnaire->questionnaire_select_by_id($questionnaire_id);

$row = mysql_fetch_row($questionnaire_result);
$title = $row[0]['title'];
$database->close_database_connection();
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
        <link rel="shortcut icon" href="../_data/img/icon.gif" />
        <link rel="stylesheet" type="text/css" href="../_data/css/style.css"/>
        <script type="text/javascript" src="../_data/js/jquery/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="../_data/js/d3/d3.v3.min.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>SUS Questionnaire Web App</h1>
            <h2>SUS Questionnaire | <?php echo $title; ?></h2>
        </div>
        <div id="navigation">
            <ul>
                <li>
                    <a href="../">Home</a>
                </li>
                <li>
                    <a href="../help">Help</a>
                </li>
            </ul>
        </div>
        <div id="content">
            <form action="submit" method="post">
                <table>
                    <thead>
                        <tr>
                            <td>Nr</td>
                            <td>Question</td>
                            <td>Strongly disagree</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>Strongly agree</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>I think that I would like to use this system frequently.</td>
                            <td></td>
                            <td><input type="radio" name="susq1" value="1"/></td>
                            <td><input type="radio" name="susq1" value="2"/></td>
                            <td><input type="radio" name="susq1" value="3"/></td>
                            <td><input type="radio" name="susq1" value="4"/></td>
                            <td><input type="radio" name="susq1" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>I found the system unnecessarily complex.</td>
                            <td></td>
                            <td><input type="radio" name="susq2" value="1"/></td>
                            <td><input type="radio" name="susq2" value="2"/></td>
                            <td><input type="radio" name="susq2" value="3"/></td>
                            <td><input type="radio" name="susq2" value="4"/></td>
                            <td><input type="radio" name="susq2" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>I thought the system was easy to use.</td>
                            <td></td>
                            <td><input type="radio" name="susq3" value="1"/></td>
                            <td><input type="radio" name="susq3" value="2"/></td>
                            <td><input type="radio" name="susq3" value="3"/></td>
                            <td><input type="radio" name="susq3" value="4"/></td>
                            <td><input type="radio" name="susq3" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>I think that I would need the support of a technical person to be able to use this system.</td>
                            <td></td>
                            <td><input type="radio" name="susq4" value="1"/></td>
                            <td><input type="radio" name="susq4" value="2"/></td>
                            <td><input type="radio" name="susq4" value="3"/></td>
                            <td><input type="radio" name="susq4" value="4"/></td>
                            <td><input type="radio" name="susq4" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>I found the various functions in this system were well integrated.</td>
                            <td></td>
                            <td><input type="radio" name="susq5" value="1"/></td>
                            <td><input type="radio" name="susq5" value="2"/></td>
                            <td><input type="radio" name="susq5" value="3"/></td>
                            <td><input type="radio" name="susq5" value="4"/></td>
                            <td><input type="radio" name="susq5" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>I thought there was too much inconsistency in this system.</td>
                            <td></td>
                            <td><input type="radio" name="susq6" value="1"/></td>
                            <td><input type="radio" name="susq6" value="2"/></td>
                            <td><input type="radio" name="susq6" value="3"/></td>
                            <td><input type="radio" name="susq6" value="4"/></td>
                            <td><input type="radio" name="susq6" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>I would imagine that most people would learn to use this system very quickly.</td>
                            <td></td>
                            <td><input type="radio" name="susq7" value="1"/></td>
                            <td><input type="radio" name="susq7" value="2"/></td>
                            <td><input type="radio" name="susq7" value="3"/></td>
                            <td><input type="radio" name="susq7" value="4"/></td>
                            <td><input type="radio" name="susq7" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>I found the system very cumbersome to use.</td>
                            <td></td>
                            <td><input type="radio" name="susq8" value="1"/></td>
                            <td><input type="radio" name="susq8" value="2"/></td>
                            <td><input type="radio" name="susq8" value="3"/></td>
                            <td><input type="radio" name="susq8" value="4"/></td>
                            <td><input type="radio" name="susq8" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>I felt very confident using the system.</td>
                            <td></td>
                            <td><input type="radio" name="susq9" value="1"/></td>
                            <td><input type="radio" name="susq9" value="2"/></td>
                            <td><input type="radio" name="susq9" value="3"/></td>
                            <td><input type="radio" name="susq9" value="4"/></td>
                            <td><input type="radio" name="susq9" value="5"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>I needed to learn a lot of things before I could get going with this system.</td>
                            <td></td>
                            <td><input type="radio" name="susq10" value="1"/></td>
                            <td><input type="radio" name="susq10" value="2"/></td>
                            <td><input type="radio" name="susq10" value="3"/></td>
                            <td><input type="radio" name="susq10" value="4"/></td>
                            <td><input type="radio" name="susq10" value="5"/></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="hidden" name="action" value="<?php echo $questionnaire_id; ?>"/></td>
                            <td><input type="hidden" name="action" value="insert_result"/></td>
                            <td><input type="submit" value="submit" /></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
        <div id="footer">
            <p>Visit our blog at <a href="http://igchi.wordpress.com/">igchi.wordpress.com</a>.</p>
        </div>
    </body>
</html>