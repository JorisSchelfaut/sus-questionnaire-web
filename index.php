<?php
$logged_in = false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>
            SUS Questionnaire Web App
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

if (! $logged_in) {
?>
            
            <div id="register-login">
                <a href="#login">Login</a>
                <a href="#register">Register</a>
            </div>
            <form action="?action=login" method="post" id="login">
                <table>
                    <tr>
                        <td>E-mail Address</td>
                        <td><input type="text" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            <form action="?action=register" method="post" id="register">
                <table>
                    <tr>
                        <td>E-mail Address</td>
                        <td><input type="text" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            
<?php } else { ?>
            
            <h3>My Questionnaires</h3>
            <table>
                <tr>
                    <td>Name</td>
                    <td>Link</td>
                </tr>
            </table>
            
<?php } ?>
        </div>
        <div id="footer">
            <p>Visit our blog at <a href="http://igchi.wordpress.com/">igchi.wordpress.com</a>.</p>
        </div>
    </body>
</html>