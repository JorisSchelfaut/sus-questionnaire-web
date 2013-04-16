<?php
require_once '_data/php/model/database.php';
require_once '_data/php/model/questionnaire.php';
require_once '_data/php/model/user.php';

$user_id = $_SESSION['USER'];

$database = new Database();
$questionnaire = new Questionnaire();
$user = new User();

$database->open_database_connection();
$user_result = $user->user_select_by_id($user_id);
$database->close_database_connection();

$database->open_database_connection();
$questionnaire_result = $questionnaire->questionnaire_select_all_by_user_id($user_id);

$arrayData;
if (!$questionnaire_result) {
    $database->close_database_connection();
    die('Could not successfully run query ($sql) from DB: ' . mysql_error());
} else {
    while ($rowAssoc = mysql_fetch_assoc($questionnaire_result)) {
        $arrayData['items'][] = $rowAssoc;
    }
    $database->close_database_connection();
}
?>
            <h3>Create a new questionnaire</h3>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Title of the questionnaire</td>
                        <td><input type="text" name="title"/></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="insert_questionnaire"/>
                        </td>
                        <td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            
            <h3>My Questionnaires</h3>
            <table>
                <thead>
                    <tr>
                        <td>Title</td><!-- test title -->
                        <td>Share URL</td><!-- FULL URL -->
                        <td>Results URL</td><!-- button -->
                        <td></td><!-- button delete -->
                        <td></td><!-- button close -->
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($arrayData['items'] as $value) {
                    $title = $value['title'];
                    $questionnaire_id = $value['_id'];
            ?>
                    <tr>
                        <td><?php echo $title; ?></td><!-- TITLE -->
                        <td><a href="sus/?id=<?php echo $questionnaire_id; ?>" target="_blank"><?php echo 'sus/?id=' . $questionnaire_id; ?></a></td><!-- URL -->
                        <td><a href="results/?id=<?php echo $questionnaire_id; ?>&user=<?php echo $questionnaire_id; ?>" target="_blank">results/?id=<?php echo $questionnaire_id; ?>&user=<?php echo $questionnaire_id; ?></a></td><!-- URL -->
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $questionnaire_id; ?>"/>
                                <input type="hidden" name="action" value="delete_questionnaire"/>
                                <input type="submit" value="delete" />
                            </form>
                        </td>
                        <td>
                        <?php if ($value['closed'] == '0') { ?>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $questionnaire_id; ?>"/>
                                <input type="hidden" name="action" value="close_questionnaire"/>
                                <input type="submit" value="close" />
                            </form>
                        <?php } else { ?>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $questionnaire_id; ?>"/>
                                <input type="hidden" name="action" value="open_questionnaire"/>
                                <input type="submit" value="open" />
                            </form>
                        <?php } ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

<?php

?>