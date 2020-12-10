<?php

/**
$sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";

if ($result = $mysqli -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    printf ("%s (%s)\n", $row[0], $row[1]);
  }
  $result -> free_result();
}
*/


/** 
//assign each value in row
foreach($row as $key => $val){
	$_SESSION[$key] = $val;
}
*/




extract($_POST);

if (isset($_POST['login'])) {

    unset($_SESSION['loginpw']);
	unset($_SESSION['login']);
	
    //echo '<br>Authenticate 02';

    if (empty($emailaddress) || empty($loginpw)) {  
        header("location:user/index.php");
    } else {  
        //$sql = "SELECT * FROM tbl_users WHERE emailaddress = '$emailaddress'";  
        
        $sql = "SELECT *, 
            tbl_users.id AS userID,
            tbl_leagues.id AS leagueID,
            tbl_divisions.id AS divisionID,
            tbl_roles.id AS roleID,
            tbl_teams.id AS teamID
            FROM ((((tbl_users
            LEFT JOIN tbl_roles ON tbl_users.id_user_role = tbl_roles.id)
            LEFT JOIN tbl_leagues ON tbl_users.id_league = tbl_leagues.id)
            LEFT JOIN tbl_divisions ON tbl_users.id_division = tbl_divisions.id)
            LEFT JOIN tbl_teams ON tbl_users.id_team = tbl_teams.id)
            WHERE emailaddress='$emailaddress'
        ";

        $result = mysqli_query($conn, $sql);  
        if(mysqli_num_rows($result) > 0) {  
            while($row = mysqli_fetch_array($result))  
            {  
                if(password_verify($loginpw, $row["password"])){  
                        //return true;  
                    foreach($row as $key => $val){
                        if (!empty($val)) {
                            $_SESSION[$key] = $val;
                        }
                    }
                    
                    $_SESSION['loggedin'] = true;

                    if(isset($_SESSION['password'])) unset($_SESSION['password']);
                    if(isset($_SESSION['dt_updated'])) unset($_SESSION['dt_updated']);
                    if(isset($_SESSION['dt_read'])) unset($_SESSION['dt_read']);
                    if(isset($_SESSION['dt_deleted'])) unset($_SESSION['dt_deleted']);
                    if(isset($_SESSION['id_phase'])) unset($_SESSION['id_phase']);
                    if(isset($_SESSION['id_parent'])) unset($_SESSION['id_parent']);
                    if(isset($_SESSION['id'])) unset($_SESSION['id']);




                    $userID = $_SESSION['userID'];

                    $sql = "SELECT *, 
                    tbl_users.id AS playerID,
                    tbl_leagues.id AS leagueID,
                    tbl_divisions.id AS divisionID,
                    tbl_teams.id AS teamID
                    FROM ((((tbl_users
                    LEFT JOIN tbl_roles ON tbl_users.id_user_role = tbl_roles.id)
                    LEFT JOIN tbl_leagues ON tbl_users.id_league = tbl_leagues.id)
                    LEFT JOIN tbl_divisions ON tbl_users.id_division = tbl_divisions.id)
                    LEFT JOIN tbl_teams ON tbl_users.id_team = tbl_teams.id)
                    WHERE tbl_users.id_guardian = '$userID'
                    ";

                    $result = mysqli_query($conn, $sql);
                    //echo 'Fetch: 02<br>';
                    if (mysqli_num_rows($result) > 0) {
                        // Fetch one and one row
                        //echo 'Fetch: 03<br>';
                                                
                        while($row = mysqli_fetch_assoc($result)){
                            
                            foreach($row as $key => $val){
                               
                                if (!empty($val)) {
                                    $i = $i++;
                                    $_SESSION[$row["playerID"].'_'.$key] = $val;
                                }
                            }
                            
                        }    
                    }    

                    //go to profile
                    header("location:user/index.php");

                } else {  
                        //return false;  
                        //echo '<script>alert("1: Wrong User Details")</script>';  
                        $notifType = 'danger';
                        $notifMsg = '<small>Login Failed. <br> Please try again, or go here if you <br><a href="/forgotpw.php">forgot your password</a></small>';
                }  
            }  
        } else {  
            $notifType = 'danger';
            $notifMsg = '<small>Login Failed. <br> Please try again, or go here if you <br><a href="/forgotpw.php">forgot your password</a></small>';
            //echo '<script>alert("2: Wrong User Details")</script>';  
        }  

    }  

}









if ( isset( $_SESSION[ 'uReg' ] ) ) {
	

	$id_onoff = 1;
	$user_type = $_POST[ 'uType' ];
	$firstname = $_POST[ 'firstname' ];
	$lastname = $_POST[ 'lastname' ];
	$emailaddress = $_POST[ 'emailaddress' ];
	$phonenumber = $_POST[ 'phonenumber' ];

	$sql = "INSERT INTO tbl_users(
			id,
			active,
			joinDate,
			user_type,
			firstname,
			lastname,
			emailaddress,
			phonenumber
		)
		VALUES(
			NULL,
			'1',
			'$joinDate',
			'$user_type',
			'$firstname',
			'$lastname',
			'$emailaddress',
			'$phonenumber'
		);";
	if ( $conn->query( $sql ) === TRUE ) {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION['alert_type'] = 'success';
		$_SESSION['alert_msg'] = 'Data inserted';
	} else {
		//echo "Failed to insert data";
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'Registration Failed! error is: ' . $sql . '<br>' . $conn->error;
	}


	unset($_SESSION[ 'uReg' ]);
}