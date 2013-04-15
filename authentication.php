<?php ?>
<?php
/**
 * <p>Creates the login / registration forms.</p>
 */
function authentication() {
?>
<div id="authentication">
                <div id="div-login">
                    <h3>Login</h3>
                    <form action="" method="post" id="form-login">
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
                                <td><input type="hidden" name="action" value="login"/></td>
                                <td><input type="submit" value="Submit"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div id="div-register">
                    <h3>Register</h3>
                    <form action="" method="post" id="form-register">
                        <table>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username"/></td>
                            </tr>
                            <tr>
                                <td>E-mail Address</td>
                                <td><input type="text" name="email"/></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password"/></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="action" value="register"/></td>
                                <td><input type="submit" value="Submit"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
<?php
}

function login () {
    require '_data/php/model/user.php';
    $user = new User();
    $_id = 0;
    $email_address = $_POST['email'];
    $password      = $_POST['password'];
    $result = $user->user_select_by_credentials($email_address, $password);
    if (!$result) {
        return false;
    } else {
        $row = mysql_fetch_row($result);
        $_id = $row['_id'];
        return true;
    }
}

/**
 * @return boolean
 */
function register () {
    require '_data/php/model/user.php';
    $user = new User();
    $_id = 0;
    $email_address = $_POST['email'];
    $password      = $_POST['password'];
    $username      = $_POST['username'];
    $result = $user->user_insert($email_address, $username, $password);
    if (!$result) {
        return false;
    } else {
        $_id = mysql_insert_id();
        return true;
    }
}
?>