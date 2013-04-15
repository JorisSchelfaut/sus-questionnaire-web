<?php
/**
 * <p>Creates the dashboard for the authenticated user.</p>
 * @param number $user_id the user id.
 */
function dashboard() {
    require '_data/php/model/questionnaire.php';
    require '_data/php/model/user.php';
    
    //$user_id = $_SESSION['AUTH'];
    //$questionnaires = questionnaire_select_all_by_user_id($user_id);
?>

<h3>My Questionnaires</h3>
            <table>
                <tr>
                    <td>Name</td>
                    <td>Link</td>
                </tr>
            </table>


<?php
}
?>