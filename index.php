<?php
// AUTHENTICATION
require_once '_data/php/model/auth.php';
require_once '_data/php/model/user.php';
require_once '_data/php/model/questionnaire.php';
$auth = new Auth();
$questionnaire = new Questionnaire();
$logged_in = isset($_SESSION['USER']);

if (!empty($_POST['action'])) {
    if ($_POST['action'] == 'login') {
        $logged_in = $auth->login($_POST['email'], $_POST['password']);
    } else if ($_POST['action'] == 'register') {
        $logged_in = $auth->register($_POST['email'], $_POST['password'], $_POST['username']);
    } else if($_POST['action'] == 'logout') {
        $logged_in = $auth->logout();
    } else if($_POST['action'] == 'insert_questionnaire') {
        $questionnaire->questionnaire_insert($_POST['user_id'], $_POST['title']);
    } else if($_POST['action'] == 'delete_questionnaire') {
        $questionnaire->questionnaire_delete($_POST['id']);
    }
} // END-IF action

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>
            SUS Questionnaire Web App | Home
        </title>
        <meta name="language" content="english"/>
        <meta name="description" content="sus questionnaire web app"/>
        <meta name="keywords" content="system usability scale questionnaire sus" />
        <link rel="shortcut icon" href="_data/img/icon.gif" />
        <link rel="stylesheet" type="text/css" href="_data/css/style.css"/>
        <script type="text/javascript" src="_data/js/jquery/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="_data/js/d3/d3.v3.min.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>SUS Questionnaire Web App</h1>
            <h2>Home</h2>
        </div>
        <div>
<?php 
    if ($logged_in) {
?>
            <form action="" method="post" id="form-logout">
                <input type="hidden" name="action" value="logout"/>
                <input type="submit" value="Logout"/>
            </form>
<?php
    }
?>
        </div>
        <div id="navigation">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="help">Help</a>
                </li>
            </ul>
        </div>
        <div id="content">
            <?php
                if ($logged_in) {
                    include_once 'dashboard.php';
                } else {
                    include 'authentication.php';
                }
            ?>
        </div>
        <div id="footer">
            <p>Visit our blog at <a href="http://igchi.wordpress.com/">igchi.wordpress.com</a>.</p>
        </div>
    </body>
</html>