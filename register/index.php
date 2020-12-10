<?php
//phpinfo();

require(getenv("DOCUMENT_ROOT").'/_inc/apptop.php');

$pgtitle = 'GYFL - Gilbert Youth Flag Football';

require($_SESSION['docroot'].'/_inc/_head.php');

?>


<div class="container">

    <div class="register">

        <?php if($_SESSION['doesitexist'] == 'y') {
                    $notifType = 'danger';
                    $notifMsg = '<small>User Already Exists. <br> Please use the <a href="/forgotpw.php">Forgot Password</a> link to retrieve your login.</small>';
                    func_notificationUser($notifType, $notifMsg);
            } ?>

        <h2 class="mb-4">Register</h2>

            <div class="row mb-4">
                <div class="col mb-5">
                    <h4><i class="fas fa-check-circle"></i> PLAY FLAG FOOTBALL - INDIVIDUAL</h4>
                    <p>League Play Flag Individual Fall 2020</p>
                    <a href="step2.php?regtype=indiv" class="btn btn-primary btn-block">Signup</a>
                </div>
                <div class="w-100"></div>
                <div class="col mb-5">
                    <h4><i class="fas fa-check-circle"></i> TEAM FLAG FOOTBALL - TEAMS ONLY</h4>
                    <p>League Play Team Registration Fall 2020</p>
                    <a href="step2.php?regtype=team" class="btn btn-primary btn-block">Signup</a>
                </div>
                <div class="w-100"></div>
                <div class="col mb-5">
                    <h4><i class="fas fa-check-circle"></i> LEARN TO FLAG FOOTBALL</h4>
                    <p>Flag Instructional Age 3-5 Coed</p>
                    <a href="step2.php?regtype=learn" class="btn btn-primary btn-block">Signup</a>
                </div>
                <div class="w-100"></div>
                <div class="col mb-5">
                    <h4><i class="fas fa-check-circle"></i> VOLUNTEER | COACH | MANAGER</h4>
                    <p>Volunteer for Flag</p>
                    <a href="step2.php?regtype=volunteer" class="btn btn-primary btn-block">Signup</a>
                </div>
            </div>

    </div>

</div><!-- end container -->



<?php
require($_SESSION['docroot'].'/_inc/_foot.php');

if(isset($_SESSION['doesitexist'])) unset($_SESSION['doesitexist']);
?>

