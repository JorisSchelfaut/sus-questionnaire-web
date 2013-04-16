<?php
require_once '_data/php/model/questionnaire.php';
require_once '_data/php/model/user.php';

$user_id = $_SESSION['USER'];
$questionnaire = new Questionnaire();
$user = new User();
$user_result = $user->user_select_by_id($user_id);
$questionnaire_result = $questionnaire->questionnaire_select_all_by_user_id($user_id);

$arrayData;
if (!$questionnaire_result) {
    die('Could not successfully run query ($sql) from DB: ' . mysql_error());
} else {
    while ($rowAssoc = mysql_fetch_assoc($questionnaire_result)) {
        $arrayData['items'][] = $rowAssoc;
    }
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
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                        </td>
                        <td><input type="submit" value="Submit"/></td>
                    </tr>
                </table>
            </form>
            
            <h3>My Questionnaires</h3>
            <table>
                <thead>
                    <tr>
                        <td>Name</td><!-- test title -->
                        <td>Share</td><!-- FULL URL -->
                        <td>Results</td><!-- button -->
                        <td>Delete</td><!-- button -->
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
                        <td><a href="sus/?id=<?php echo $questionnaire_id; ?>" target="_blank"><?php echo 'results/?id=' . $questionnaire_id; ?></a></td><!-- URL -->
                        <td>
                            <form action="results/?id=<?php echo $questionnaire_id; ?>&user=<?php echo $questionnaire_id; ?>" method="post">
                                <input type="submit" value="results" />
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $questionnaire_id; ?>"/>
                                <input type="hidden" name="action" value="delete_questionnaire"/>
                                <input type="submit" value="delete" />
                            </form>
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
                    </tr>
                </tfoot>
            </table>
