<?php

require( '_inc/apptop.php' );

if(!empty($_SESSION['loggedin'])) header('Location: user/index.php');

$pgtitle = 'The League';


require($_SESSION['docroot'].'/_inc/_head.php');
?>


<div class="container">
    <div class="login">
        <h1>Forgot Password</h1>
        <p class="px-4 drkgrey">Enter your email and if we recognize it, we will send you a link to reset your password.</p>
        <form action="authenticate.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="email" name="emailaddress" placeholder="Email" id="emailaddress" value="<?php echo $_SESSION['emailaddress'] ? $_SESSION['emailaddress'] : 'Enter your email'; ?>" required>
            <input type="submit" name="login" value="Send me my link">
            <div class="text-center pt-3">
                <p><a href="/login.php">Cancel</a></p>
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