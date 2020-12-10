<?php

if ( isset( $_SESSION[ 'uReg1' ] ) ) {
	unset($_SESSION[ 'uReg1' ]);

	if(empty($_SESSION['emailaddress'])) return false;

	//does user exist?
	func_dupecheck($conn, $_SESSION[ 'emailaddress' ]);

	//echo "Check:: insert 04 | ";

	if($_SESSION['doesitexist'] == 'y') {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'User Already Exists. Please use the forgot password link to retrieve your login.';
		

	} else {

		//echo "Check:: insert 05a | ";

		//$id_onoff = 1;
		//$dt = NOW(); //breaks php
		$dt = date("Y-m-d H:i:s");
		extract($_POST);
		$password = password_hash($regpw, PASSWORD_DEFAULT);
		/** 
		$league_name = $_POST['league_name'];
		//$_SESSION['leagueCreation'] = $user_type;
		*/

		//echo "Check:: insert 05b | ";

		//insert data into USERS
		$sql = "INSERT INTO tbl_users (
			dt_created,
			dt_read,
			dt_updated,
			emailaddress,
			password,
			id_league
		)
		VALUES(
			'$dt',
			'$dt',
			'$dt',
			'$emailaddress',
			'$password',
			'1'
		);";

		//echo '<br>' . $sql;

		//user data into SESSION
		if ( $conn->query( $sql ) === TRUE ) {

			//echo "Check:: insert 06 | ";

			$sql = "SELECT * FROM tbl_users WHERE emailaddress = '$emailaddress'";
			$result = mysqli_query($conn, $sql);
		
			if (mysqli_num_rows($result) > 0) {

				//echo "Check:: insert 07 | ";

				// output data of each row
				$row = mysqli_fetch_assoc($result);
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " " . $row["emailaddress"]. "<br>";

				$_SESSION[ 'alertMe' ] = 1;
				$_SESSION[ 'alert_type' ] = 'success';
				$_SESSION[ 'alert_msg' ] = 'Record Retrieved';

				foreach($row as $key => $val){
					$_SESSION[$key] = $val;
				}

				$_SESSION['userID'] = $row['id'];

				if (isset($_SESSION['id'])) unset($_SESSION['id']);
				if (isset($_SESSION['password'])) unset($_SESSION['password']);
				if (isset($_SESSION['dt_deleted'])) unset($_SESSION['dt_deleted']);
				if (isset($_SESSION['regpw'])) unset($_SESSION['regpw']);
	
				//$_SESSION['loggedin'] = TRUE;
				//clean the SESSION of POST vars
				?><script>window.location.href = "/register/step3.php";</script><?php
			
			} else {
				$_SESSION[ 'alertMe' ] = 1;
				$_SESSION[ 'alert_type' ] = 'danger';
				$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Record Retrieval failed. Error is: <br>' . $conn->error;
			} //eof if (mysqli_num_rows($result) > 0)
		} else {
			$_SESSION[ 'alertMe' ] = 1;
			$_SESSION[ 'alert_type' ] = 'danger';
			$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Record insert failed. Error is: <br>' . $conn->error;
		} //eof if (mysqli_num_rows($result) > 0)



	}
}


if ( !empty( $_SESSION[ 'uReg2' ] ) ) {
	unset( $_SESSION[ 'uReg2' ] );

	//echo '<br>Edit reg2 : 01';

	$update = true;

	//$_SESSION[ 'edit' ] = 'yes: ' . $id;

	extract($_SESSION);

	//$dt = NOW(); //breaks php
	$dt = date("Y-m-d H:i:s");


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
			WHERE id=$userID";
	$result = $conn->query( $sql );

	//echo '<br>Edit reg2 : 02';


	if ($conn->query($sql) === TRUE) {

		$_SESSION[ 'loggedin' ] = TRUE;

		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'success';
		$_SESSION[ 'alert_msg' ] = 'Data Retrieved for Edit' . $result;
		?><script>window.location.href = "/user/index.php";</script><?php
	
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'notifType' ] = 'danger';
		$_SESSION[ 'notifMsg' ] = 'EDIT ERROR! Data Retrieval failed. Error is:' . $conn->error;
		?><script>window.location.href = "/register/step3.php?error=yes";</script><?php
	}

}



if ( isset( $_SESSION[ 'playerReg1' ] ) ) {
	unset($_SESSION[ 'playerReg1' ]);

	if(empty($_SESSION['emailaddress'])) return false;

	//does user exist?
	func_dupecheck($conn, $_SESSION[ 'emailaddress' ]);

	//echo "Check:: insert 04 | ";

	if($_SESSION['doesitexist'] == 'y') {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'User Already Exists. Please use the forgot password link to retrieve your login.';
		

	} else {

		//echo "Check:: insert 05a | ";

		//$id_onoff = 1;
		//$dt = NOW(); //breaks php
		$dt = date("Y-m-d H:i:s");
		extract($_POST);
		$password = password_hash($regpw, PASSWORD_DEFAULT);
		/** 
		$league_name = $_POST['league_name'];
		//$_SESSION['leagueCreation'] = $user_type;
		*/

		//echo "Check:: insert 05b | ";
		
		//insert data into USERS
		$sql = "INSERT INTO tbl_users (
			dt_created,
			dt_read,
			dt_updated,
			emailaddress,
			firstname,
			lastname,
			birthday,
			password,
			id_league,
			id_guardian
		)
		VALUES(
			'$dt',
			'$dt',
			'$dt',
			'$emailaddress',
			'$firstname',
			'$lastname',
			'$player_birthday',
			'$password',
			'1', 
			'$id_guardian'
		);";

		//echo '<br>' . $sql;

		//user data into SESSION
		if ( $conn->query( $sql ) === TRUE ) {

			//echo "Check:: insert 06 | ";

			$sql = "SELECT * FROM tbl_users WHERE emailaddress = '$emailaddress'";
			$result = mysqli_query($conn, $sql);
		
			if (mysqli_num_rows($result) > 0) {

				//echo "Check:: insert 07 | ";

				// output data of each row
				$row = mysqli_fetch_assoc($result);
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " " . $row["emailaddress"]. "<br>";

				$_SESSION[ 'alertMe' ] = 1;
				$_SESSION[ 'alert_type' ] = 'success';
				$_SESSION[ 'alert_msg' ] = 'Record Retrieved';

				/** 
				foreach($row as $key => $val){
					$_SESSION[$key] = $val;
				}
				*/
				
				$_SESSION['player_ID'] = $row['id'];
				$_SESSION['player_fname'] = $row['firstname'];
				$_SESSION['player_lname'] = $row['lastname'];
				$_SESSION['player_birthday'] = $row['birthday'];

				if (isset($_SESSION['id'])) unset($_SESSION['id']);
				if (isset($_SESSION['password'])) unset($_SESSION['password']);
				if (isset($_SESSION['dt_deleted'])) unset($_SESSION['dt_deleted']);
				if (isset($_SESSION['regpw'])) unset($_SESSION['regpw']);
	
				//$_SESSION['loggedin'] = TRUE;
				//clean the SESSION of POST vars
				?><script>window.location.href = "/user/index.php";</script><?php
			
			} else {
				$_SESSION[ 'alertMe' ] = 1;
				$_SESSION[ 'alert_type' ] = 'danger';
				$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Record Retrieval failed. Error is: <br>' . $conn->error;
			} //eof if (mysqli_num_rows($result) > 0)
		} else {
			$_SESSION[ 'alertMe' ] = 1;
			$_SESSION[ 'alert_type' ] = 'danger';
			$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Record insert failed. Error is: <br>' . $conn->error;
		} //eof if (mysqli_num_rows($result) > 0)



	}
}