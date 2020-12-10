<?php
//phpinfo();
require(getenv("DOCUMENT_ROOT").'/_inc/apptop.php');

$pgtitle = 'GYFL - Gilbert Youth Flag Football';

require($_SESSION['docroot'].'/_inc/_head.php');

?>


<div class="container">

    <div class="register">

        <?php func_alert(); ?>


        <div class="row my-4">
            <div class="col-12 mb-3">
                <h3>Welcome <?php echo $_SESSION["firstname"] ;?> <?php echo $_SESSION["lastname"] ;?></h3>
                <p><strong>Email</strong> <?php echo $_SESSION["emailaddress"] ;?></p>
            </div>

            <div class="col-6 mb-3">
                <h4>Phone</h4>
                <p><?php echo $_SESSION["phonenumber"] ;?></p>
            </div>

            <div class="col-6 mb-3">
                <h4>Address</h4>
                <p>
                    <?php echo $_SESSION["user_address1"] . ' ' . $_SESSION["user_address2"] ;?> <br>
                    <?php echo $_SESSION["user_city"] . ', ' . $_SESSION["user_st"] . ' ' . $_SESSION["user_zip"] ;?>
                </p>
            </div>

            <div class="col-6 mb-3">
                <h4>User Type</h4>
                <p><?php echo $_SESSION["user_type"] ;?></p>
            </div>


            <div class="col-6 mb-3">
                <h4>League</h4>
                <p><?php echo $_SESSION["league_name"] ;?></p>
            </div>

            <div class="col-12 mb-3">
                <h4>Division and Team</h4>
                <p><?php echo $_SESSION["division_name"] ;?> <?php echo $_SESSION["team_name"] ;?></p>
                <p><?php echo $_SESSION["division_desc"] ;?></p>
            </div>

            <?php  if(!empty($_SESSION['player_ID'])) { ?>

            <div id="playerinfo" class="row mb-4">

                <div class="row col-12">
                    <div class="form-group col">
                        <h2>Player Info</h2>
                    </div>
                </div>

                <div class="col-6 mb-2">Player ID </div>
                <div class="col-6 mb-2"><?php echo $_SESSION['player_ID'] ?></div>
                
                <div class="col-6 mb-2">First Name</div>
                <div class="col-6 mb-2"><?php echo $_SESSION['player_fname'] ?></div>
                
                <div class="col-6 mb-2">Last Name</div>
                <div class="col-6 mb-2"><?php echo $_SESSION['player_lname'] ?></div>
                
                <div class="col-6 mb-2">Birthday</div>
                <div class="col-6 mb-2"><?php echo $_SESSION['player_birthday'] ?></div>
          
            </div>

            <?php    } ?>

            <script>
            $(document).ready(function() {
                $("#addplayer").click(function() {
                    $("#regplayer").show(250);
                    $("#addplayer").hide(250);
                });
            });
            </script>

            <div class="col-12 mb-4">
                <button class="btn btn-lg btn-success w-100" id="addplayer">Register A Player</button>
            </div>

            <div id="regplayer" style="display:none;" class="col-12 mb-4">

                <hr>

                <div class="row">
                    <div class="form-group col">
                        <h1>Register A Player</h1>
                        <h4>Fill this out:</h4>
                    </div>
                </div>

                <form method="post" name="playerReg1">

                    <input type="hidden" name="id_guardian" value="<?php echo $_SESSION['userID'] ?>">

                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name"
                                value="" required>
                        </div>

                        <div class="form-group col">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                                value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="playerBirthday">Birthday</label>
                            <input type="text" class="form-control numbersonly" name="player_birthday" id="birthday"
                                placeholder="Birthday"
                                value="" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="playerEmailaddress">Player's Email address <small>(not required)</small></label>
                            <input type="email" id="email" class="form-control" name="emailaddress" placeholder="Enter email"
                                value="">
                            <small class="form-text text-muted">We'll never share this email with anyone else.</small>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 w-100">
                            <button type="submit" class="btn-lg btn-info w-100 pointer" name="playerReg1" value="1">Submit Registration</button>
                        </div>
                    </div>

                </form>

                <hr>

            </div>



        </div>


        <div class="mt-4">
            <p>
                <?php
                echo '<pre style="color:#fff;">';
                print_r($_SESSION);
                echo '</pre>';
                ?>
            </p>
        </div>

    </div>




    <div class="login">
        <h1>Change Your Password</h1>
        <form method="post">
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="newpw" placeholder="Password" id="password" value="wra456" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="confirmnewpw" placeholder="Confirm Password" id="password" value="wra456"
                required>
            <input type="submit" name="chngpw" value="Update Password">
            <div class="text-center pt-3">
                <p></p>
            </div>
        </form>
    </div>


</div><!-- end container -->



<?php
require($_SESSION['docroot'].'/_inc/_foot.php');

if(isset($_SESSION['doesitexist'])) unset($_SESSION['doesitexist']);
?>