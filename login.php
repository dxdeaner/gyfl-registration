<?php

require( '_inc/apptop.php' );

if(!empty($_SESSION['loggedin'])) header('Location: user/index.php');

$pgtitle = 'The League';

require($_SESSION['docroot'].'/_inc/_head.php');
?>


<div class="container">
    <div class="login">
        <?php func_notificationUser($notifType, $notifMsg); ?>
        <h1>Login</h1>
        <form method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="email" name="emailaddress" placeholder="Email" id="emailaddress"
                value="<?php echo $_SESSION['emailaddress'] ? $_SESSION['emailaddress'] : 'dx@deaner.com'; ?>"
                required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="loginpw" placeholder="Password" id="password" value="wra456" required>
            <?php if(isset($_SESSION['notifyMe'])) { 
                func_notificationUser($_SESSION['notifType'], $_SESSION['notifMsg']);
            }  ?>
            <input type="submit" name="login" value="Login">
            <div class="text-center pt-3">
                <p><a href="/forgotpw.php">Forgot Password</a></p>
                <p><a href="/register/index.php">Register</a></p>
            </div>
        </form>
    </div>
</div>
<!-- end container -->

<?php
if(isset($_SESSION['password'])) unset($_SESSION['password']);
if(isset($_SESSION['notifyMe'])) unset($_SESSION['notifyMe']);
if(isset($_SESSION['notifType'])) unset($_SESSION['notifType']);
if(isset($_SESSION['notifMsg'])) unset($_SESSION['notifMsg']);

require($_SESSION['docroot'].'/_inc/_foot.php');
?>