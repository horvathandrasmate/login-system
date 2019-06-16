<?php
?>

<link rel="stylesheet" href="<?php echo css_url("login_main.css") ?>">
<div class="login-wrap center">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">

            <div class="sign-in-htm">
                <form method="post" action="">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="username">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>

                    <div class="group">
                        <input type="submit" class="button" value="LOGIN" name="login">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <div class="sign-up-htm">
                <form method="post" action="">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="username">
                </div>
                <div class="group">
                    <label for="user" class="label">Real Name</label>
                    <input id="user" type="text" class="input" name="nice_user_name">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="repeat_password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="pass" type="email" class="input" name="email">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="REGISTER" name="register">
                </div>
                </form>

            </div>
        </div>
    </div>
</div>