<?php

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
            <h2>SUS</h2>
        </div>
        <div id="navigation">
            <ul>
                <li>
                    <a href="../">Home</a>
                </li>
                <li>
                    <a href="">New Questionnaire</a>
                </li>
                <li>
                    <a href="../help">Help</a>
                </li>
            </ul>
        </div>
        <div id="content">

<?php
if (! empty($_POST['name'])) {
    $sus_id = '';
    $user_id = '';
    $hash = ''; // hash of the name
    $url = '../sus/?id=' . $sus_id . '&user=' . $user_id . '&hash=' . $hash;
?>
            <p>
                Your SUS questionnaire is available at :<a href="<?php echo $url; ?>" target="_blank"><em><?php echo $url; ?></em></a>.
            </p>
<?php

} else {
?>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Title of the questionnaire</td>
                        <td><input type="text" name="title"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
<?php } ?>
        </div>
        <div id="footer">
            
        </div>
    </body>
</html>