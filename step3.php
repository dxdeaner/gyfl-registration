<?php
//phpinfo();
require('../_inc/apptop.php');

$pgtitle = 'Registration - Step 3';

require($_SESSION['docroot'].'_inc/_head.php');

extract($_SESSION);

?>


<div class="container">

    <div class="register">

        <h2>Registration Complete </h2>

        <form method="post" name="uReg2">

            <div class="row">
                <div class="col"><h5>Loginto your account</h5></div>
            </div>

            <div class="row">
                <div class="form-group col">
                    
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="uEdit" value="1">Sign In</button>
        </form>

    </div>

</div><!-- end container -->



<?php
require($_SESSION['docroot'].'/_inc/_foot.php');
?>