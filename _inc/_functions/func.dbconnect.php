<?php

// Create connection
$conn = new mysqli( GYFL_DBHOST, GYFL_USER, GYFL_PASS, GYFL_DBNAME );

//Proceedural
if (mysqli_connect_errno()) {
	$_SESSION[ 'alertMe' ] = 1;
	$_SESSION[ 'alert_type' ] = 'danger';
	$_SESSION[ 'alert_msg' ] = "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
	//$_SESSION[ 'alertMe' ] = 1;
	$_SESSION[ 'alert_type' ] = 'success';
	$_SESSION[ 'alert_msg' ] = "Connected to database successfully";
}

function func_connectCheck($conn) {
	echo 'checking<br>';
	/* check if server is alive */
	if ($conn->ping()) {
		$_SESSION['dbconnected'] = "y";
		echo 'connected';
	} else {
		echo 'wasnt connected<br>';
		$conn = new mysqli( GYFL_DBHOST, GYFL_USER, GYFL_PASS, GYFL_DBNAME );
		echo 'now it is<br>';
	}
}
