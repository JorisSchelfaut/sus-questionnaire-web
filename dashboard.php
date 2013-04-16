<?php
require_once '_data/php/model/questionnaire.php';
require_once '_data/php/model/user.php';

$user_id = $_SESSION['USER'];
$questionnaire = new Questionnaire();
$user = new User();
$questionnaires = $questionnaire->questionnaire_select_all_by_user_id($user_id);
?>
            
            
            
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
                // FOR EACH record
                for ($i = 0; $i < 10; $i++) {
            ?>
                    <tr>
                        <td>Test</td>
                        <td>http://example.com</td>
                        <td>Results</td>
                        <td>Delete</td>
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
