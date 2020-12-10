<?php

require('_inc/apptop.php' );

if(!empty($_SESSION['loggedin'])) header('Location: user/index.php');

$pgtitle = 'The League';



require($_SESSION['docroot'].'/_inc/_head.php');
?>



<div class="container">

    <div class="register">

        <h2>Continue Registration: <small>Step 2</small> </h2>

        <h2>Register</h2>

        <h4>Step 1</h4>

        <p>
            <pre>
                <?php 
                    print_r($_SESSION);

                    //$del = $_SESSION["tmp_"] . "%";
                    /** 
                    foreach($_SESSION as $key => $val){
                        //$_SESSION[$key] = $val;
                        unset($_SESSION[$key]);
                    }
                    
                    echo '<br>---------------------------------------<br>';
                    print_r($_SESSION);
                    */
                ?>
            </pre>
        </p>

    </div>
    
</div>



<?php


/** 
foreach($_SESSION["tmp_"] . "%" as $key => $val){
    //$_SESSION[$key] = $val;
    //$x = $_REQUEST["tmp_"] . "%";
    unset($_SESSION[$key]);
}
*/
if(isset($_SESSION['password'])) unset($_SESSION['password']);
if(isset($_SESSION['notifyMe'])) unset($_SESSION['notifyMe']);
if(isset($_SESSION['notifType'])) unset($_SESSION['notifType']);
if(isset($_SESSION['notifMsg'])) unset($_SESSION['notifMsg']);

require($_SESSION['docroot'].'/_inc/_foot.php');
?>



<?php exit(); ?>

<script>
window.location.href = "http://www.gilbertyouthfootballleague.com/";
</script>

<?php
header("Location: http://www.gilbertyouthfootballleague.com/");
exit();
?>