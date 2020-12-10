<?php
//phpinfo();
require(getenv("DOCUMENT_ROOT").'/_inc/apptop.php');

$pgtitle = 'GYFL - Gilbert Youth Flag Football';

require($_SESSION['docroot'].'/_inc/_head.php');

extract($_SESSION);

?>


<div class="container">

    <div class="register">

        <h2>Continue Registration: <small>Step 2</small> </h2>

        <h2>Register</h2>

        <h4>Step 1</h4>

        <?php if($_SESSION['doesitexist'] == 'y') {
                    $notifType = 'danger';
                    $notifMsg = '<small>User Already Exists. <br> Please use the <a href="/forgotpw.php">Forgot Password</a> link to retrieve your login.</small>';
                    func_notificationUser($notifType, $notifMsg);
            } ?>

        <form method="post" name="uReg1">
            <div class="form-group">
                <label for="emailaddress">Email address</label>
                <input type="email" class="form-control" name="emailaddress" placeholder="Enter email"
                    value="GYFL_13@testing.com">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>

            </div>
            <div class="form-group">
                <label for="regpw">Password</label>
                <input type="password" class="form-control" name="regpw" placeholder="Password" value="snithe">
            </div>
            <div class="form-group">
                <label for="regpw">Confirm Your Password</label>
                <input type="password" class="form-control" name="regpw" placeholder="Confirm Password" value="snithe">
                <div class="form-check">
                    <small>By creating a member account and logging into the Connect product you are agreeing to the
                        GYFL Terms of Service and Privacy Policy.</small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="uReg1" value="1">Submit</button>
        </form>


    </div>

</div><!-- end container -->



<?php
require($_SESSION['docroot'].'/_inc/_foot.php');

if(!empty($_SESSION['doesitexist'])) unset($_SESSION['doesitexist']); 
?>