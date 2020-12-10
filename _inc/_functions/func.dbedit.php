<?php

$update = false;

if ( isset( $_GET[ 'deactivate' ] ) ) {
	$update = true;
	$id = $_GET[ 'deactivate' ];

	$_SESSION[ 'deactivate' ] = 'yes';

	$sql = "UPDATE employees SET active=0 WHERE id=$id;";

	if ( $conn->query( $sql ) === TRUE ) {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'success';
		$_SESSION[ 'alert_msg' ] = 'Record Inactivated';
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'ERROR! Deactivation failed. Error is:' . $conn->error;
	}

	unset( $_SESSION[ 'deactivate' ] );

}

if ( !empty( $_SESSION[ 'uEdit' ] ) ) {
	unset( $_SESSION[ 'uEdit' ] );

	//echo '<br>Edit : 01';

	$update = true;
	$id = $_SESSION['userID'];
	//$_SESSION[ 'edit' ] = 'yes: ' . $id;

	$sql = "SELECT * FROM tbl_users WHERE id=$id";
	$result = $conn->query( $sql );
	$row = $result->fetch_assoc();

	//$dt = NOW(); //breaks php
	$dt = date("Y-m-d H:i:s");

	extract($_SESSION);

	$user_address2 = $user_address2 ? $user_address2 : '';

	$sql = "UPDATE tbl_users SET 
				dt_read='$dt',
				dt_updated='$dt',
				firstname='$firstname',
				lastname='$lastname',
				phonenumber='$phonenumber',
				user_address1='$user_address1',
				user_address2='$user_address2',
				user_city='$user_city',
				user_st='$user_st',
				user_zip='$user_zip',
				id_user_role='$id_user_role'
			WHERE id=$id";
	$result = $conn->query( $sql );

	//echo '<br>Edit : 02';

	if ($conn->query($sql) === TRUE) {

		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'success';
		$_SESSION[ 'alert_msg' ] = 'Data Retrieved for Edit' . $result;
		?><script>window.location.href = "/complete.php";</script><?php
	
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Data Retrieval failed. Error is:' . $conn->error;
		?><script>window.location.href = "/registration.php";</script><?php
	}

}



if ( !empty( $_SESSION[ 'chngpw' ] ) ) {
	unset( $_SESSION[ 'chngpw' ] );

	//echo '<br>Edit : 01';

	$update = true;
	$id = $_SESSION['userID'];
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
		$_SESSION[ 'notifType' ] = 'success';
		$_SESSION[ 'notifMsg' ] = 'Data Retrieved for Edit' . $result;
	
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'notifType' ] = 'danger';
		$_SESSION[ 'notifMsg' ] = 'EDIT ERROR! Data Retrieval failed. Error is:' . $conn->error;
	}

}



