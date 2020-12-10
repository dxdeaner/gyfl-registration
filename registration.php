<?php
//phpinfo();
require( '_inc/apptop.php' );

$pgtitle = 'Registration - Step 2';

require($_SESSION['docroot'].'/_inc/_head.php');

extract($_SESSION);

?>


<div class="container">

    <div class="register">

        <h2>Continue Registration: <small>Step 2</small> </h2>

        <form method="post" name="uReg2">

            <div class="row">
                <div class="col"><h5>Contact Info</h5></div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name"
                        value="<?php echo $_SESSION['firstname'] ? $_SESSION['firstname'] : '' ?>" required>
                </div>

                <div class="form-group col">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                        value="<?php echo $_SESSION['lastname'] ? $_SESSION['lastname'] : '' ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <input type="text" class="form-control numbersonly" name="phonenumber" id="phonenumber"
                        placeholder="Phone Number"
                        value="<?php echo $_SESSION['phonenumber'] ? $_SESSION['phonenumber'] : '' ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col"><h5>Address</h5></div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <input type="text" name="user_address1" class="form-control" placeholder="Street Address">
                </div>
                <div class="form-group col">
                    <input type="text" name="user_address2" class="form-control" placeholder="Apt/Suite">
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <input type="text" name="user_city" class="form-control" placeholder="City">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <select name="user_st" class="form-control">
                        <?php require($_SESSION['docroot'].'_inc/us_states.php' ); ?>
                    </select>
                </div>

                <div class="form-group col-6">
                    <input type="text" name="user_zip" class="form-control numbersonly" maxlength="5" pattern="[0-9]*" placeholder="Zip">
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="">Are you a...</label>
                    <select name="id_user_role" id="user_role" class="form-control" required>
                        <option>Select One</option>
                        <option value="8">Parent/Guardian</option>
                        <option value="7">Player</option>
                        <option value="6">Referee</option>
                        <option value="10">Sponsor</option>
                        <option value="9">Volunteer</option>
                    </select>
                </div>
            </div>

            <!--<div class="form-group">
                    <input type="" class="form-control" name="" placeholder="" 
                        value="<?php echo $_SESSION[''] ? $_SESSION[''] : '' ?>">
                </div>

                <div class="form-group">
                    <label for=""></label>
                    <input type="" class="form-control" name="" placeholder="" 
                        value="<?php echo $_SESSION[''] ? $_SESSION[''] : '' ?>">
                    <small class="form-text text-muted"></small>
                </div>-->

            <button type="submit" class="btn btn-primary" name="uEdit" value="1">Continue</button>
        </form>

    </div>

</div><!-- end container -->



<?php
require($_SESSION['docroot'].'/_inc/_foot.php');
?>