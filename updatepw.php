<?php  

require( '_inc/apptop.php' );

$pgtitle = 'Reset Password';

if ( !empty( $_SESSION[ 'updatepw' ] ) ) {
	unset( $_SESSION[ 'updatepw' ] );

	//echo '<br>Edit : 01';

	//$_SESSION[ 'edit' ] = 'yes: ' . $id;


	/** 
	$sql = "SELECT * FROM tbl_users WHERE id=$id";
	$result = $conn->query( $sql );
	$row = $result->fetch_assoc();
	*/

	//$dt = NOW(); //breaks php
	$dt = date("Y-m-d H:i:s");

	extract($_POST);
	$password = password_hash($newpw, PASSWORD_DEFAULT);


	$sql = "UPDATE tbl_users SET 
				dt_read='$dt',
				dt_updated='$dt',
				password='$password'
			WHERE id=$id";
	$result = $conn->query( $sql );

	//echo '<br>Edit : 02';

	if ($conn->query($sql) === TRUE) {

		$_SESSION[ 'alertMe' ] = 1;
		$notifType = 'success';
		$notifMsg = 'PW locked and loaded';
	
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$notifType = 'danger';
		$notifMsg = 'EDIT ERROR! Data Retrieval failed. Error is:' . $conn->error;
	}

}

require($_SESSION['docroot'].'/_inc/_head.php');

session_destroy();
  
?>

<br /><br />

<div class="login">
    <h1>Change Your Password</h1>
    <?php func_notificationUser($notifType, $notifMsg); ?>
    <form method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="id" placeholder="ID" id="" value="3" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="newpw" placeholder="Password" id="password" value="wra456" required>
        <input type="submit" name="updatepw" value="Update Password">
        <div class="text-center pt-3">
            <p></p>
        </div>
    </form>
</div>



<?php
if(isset($_SESSION['password'])) unset($_SESSION['password']);
if(isset($_SESSION['notifyMe'])) unset($_SESSION['notifyMe']);
if(isset($_SESSION['notifType'])) unset($_SESSION['notifType']);
if(isset($_SESSION['notifMsg'])) unset($_SESSION['notifMsg']);

require($_SESSION['docroot'].'/_inc/_foot.php');
?>