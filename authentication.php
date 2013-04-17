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
                                <td>
                                    <!-- CAPTCHA -->
                                    <?php $_SESSION['captcha_code'] = $_SESSION['captcha']['code']; ?>
                                    <img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="CAPTCHA" />
                                </td>
                                <td><input type="text" name="captcha"/></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="action" value="register"/></td>
                                <td><input type="submit" value="Submit"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>