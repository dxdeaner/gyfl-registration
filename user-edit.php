<?php
//phpinfo();
require( '_inc/apptop.php' );

if (!empty($_POST['edituser'])) {

    extract($_POST);
    
    $userID = $_GET['userID'];

    $sql = "UPDATE tbl_users SET 
				firstname='$firstname',
				lastname='$lastname',
				emailaddress='$emailaddress',
				phonenumber='$phonenumber',
                user_address1='$user_address1',
                user_address2='$user_address2',
                user_city='$user_city',
                user_st='$user_st',
                user_zip='$user_zip',
				id_user_role='$role_id',
				id_league='$league_id',
				id_division='$division_id',
				id_team='$team_id'
            WHERE id=$userID";
    $result = $conn->query( $sql );

    if ( $conn->query( $sql ) === TRUE ) {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'success';
		$_SESSION[ 'alert_msg' ] = 'Record Udated';
	} else {
		$_SESSION[ 'alertMe' ] = 1;
		$_SESSION[ 'alert_type' ] = 'danger';
		$_SESSION[ 'alert_msg' ] = 'EDIT ERROR! Record Update failed. Error is:' . $conn->error;
    }
   
}

$pgtitle = 'Users';

if (!empty($_SESSION[ 'alert_msg' ])) { func_alert(); } 
require($_SESSION['docroot'].'/_inc/_head.php');
 
?>

<div class="container" style="width:100%;max-width:700px;">


    <?php

        if(!empty($_GET['userID'])) $userID = $_GET['userID'];

        /** 
        $sql = "SELECT * FROM tbl_users WHERE id = $userID";
        */
        //multi-table join
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
            WHERE tbl_users.id = '$userID'
            ";

        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        //echo 'Fetch: 02<br>';



        if (mysqli_num_rows($result) > 0) {
            // Fetch one and one row
            //echo 'Fetch: 03<br>';
            extract($row);

            foreach($row as $postkey => $postval){
                $_USER[$postkey] = $postval;
            }
            

        } else {
            $_SESSION[ 'alertMe' ] = 1;
            $_SESSION[ 'alert_type' ] = 'danger';
            $_SESSION[ 'alert_msg' ] = 'no results fetched';
            echo 'no results fetched';
        }

        ?>

<h2>User ID: <?php echo $_USER["userID"] ;?>, <?php echo $_USER["firstname"].' '.$_USER["lastname"] ;?></h2>
    
    <form method="POST" action="?userID=<?php echo $_USER["userID"] ;?>">

        <table class="table table-dark">

            <tr>
                <th scope="col">First</th>
                <td><input type="text" class="form-control" name="firstname" value="<?php echo $_USER["firstname"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Last</th>
                <td><input type="text" class="form-control" name="lastname" value="<?php echo $_USER["lastname"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Email</th>
                <td><input type="text" class="form-control" name="emailaddress" value="<?php echo $_USER["emailaddress"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Phone</th>
                <td><input type="text" class="form-control" name="phonenumber" value="<?php echo $_USER["phonenumber"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Street Address</th>
                <td><input type="text" class="form-control" name="user_address1" value="<?php echo $_USER["user_address1"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Suite/Apt</th>
                <td><input type="text" class="form-control" name="user_address2" value="<?php echo $_USER["user_address2"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">City</th>
                <td><input type="text" class="form-control" name="user_city" value="<?php echo $_USER["user_city"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">State</th>
                <td><input type="text" class="form-control" name="user_st" value="<?php echo $_USER["user_st"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col">Zip</th>
                <td><input type="text" class="form-control" name="user_zip" value="<?php echo $_USER["user_zip"] ;?>"></td>
            </tr>
            <tr>
                <th scope="col" nowrap>Role</th>
                <td>
                    <div class="row">
                        <div class="col"><?php echo $_USER["user_type"] ;?></div>
                        <div class="col">
                            <select name="role_id" class="form-control">
                                <option value="<?php echo $_USER["roleID"] ;?>">Change User Type</option>
                                <?php

                                    $sql = "SELECT id, user_type FROM tbl_roles";
                                    $result = $conn->query( $sql );
                                    
                                    
                                    //$row = $result->fetch_assoc();    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=". $row['id'] .">".$row['user_type']."</option>";
                                        }
                                    } else {
                                        //$_SESSION[ 'alertMe' ] = 1;
                                        $_SESSION[ 'alert_type' ] = 'danger';
                                        $_SESSION[ 'alert_msg' ] = "fetch failed";
                                    }

                                ?>
                            </select>
                            <?php if (!empty($_SESSION[ 'alert_msg' ])) { func_alert(); } ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="col" nowrap>League</th>
                <td>
                    <div class="row">
                        <div class="col"><?php echo $_USER["league_name"] ;?></div>
                        <div class="col">
                            <select name="league_id" class="form-control">
                                <option value="<?php echo $_USER["leagueID"] ;?>">Change League</option>
                                <?php

                                    $sql = "SELECT id, league_name FROM tbl_leagues";
                                    $result = $conn->query( $sql );
                                    
                                    
                                    //$row = $result->fetch_assoc();    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=". $row['id'] .">".$row['league_name']."</option>";
                                        }
                                    } else {
                                        //$_SESSION[ 'alertMe' ] = 1;
                                        $_SESSION[ 'alert_type' ] = 'danger';
                                        $_SESSION[ 'alert_msg' ] = "fetch failed";
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="col" nowrap>Division</th>
                <td>
                    <div class="row">
                        <div class="col"><?php echo $_USER["division_name"] ;?></div>
                        <div class="col">
                            <select name="division_id" class="form-control">
                                <option value="<?php echo $_USER["divisionID"] ;?>">Change Division</option>
                                <?php

                                    $sql = "SELECT id, division_name FROM tbl_divisions";
                                    $result = $conn->query( $sql );
                                    
                                    
                                    //$row = $result->fetch_assoc();    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=". $row['id'] .">".$row['division_name']."</option>";
                                        }
                                    } else {
                                        //$_SESSION[ 'alertMe' ] = 1;
                                        $_SESSION[ 'alert_type' ] = 'danger';
                                        $_SESSION[ 'alert_msg' ] = "fetch failed";
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="col" nowrap>Team</th>
                <td>
                    <div class="row">
                        <div class="col"><?php echo $_USER["team_name"] ;?></div>
                        <div class="col">
                            <select name="team_id" class="form-control">
                                <option value="<?php echo $_USER["teamID"] ;?>">Change Team</option>
                                <?php

                                    $sql = "SELECT id, team_name FROM tbl_teams";
                                    $result = $conn->query( $sql );
                                    
                                    
                                    //$row = $result->fetch_assoc();    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=". $row['id'] .">".$row['team_name']."</option>";
                                        }
                                    } else {
                                        //$_SESSION[ 'alertMe' ] = 1;
                                        $_SESSION[ 'alert_type' ] = 'danger';
                                        $_SESSION[ 'alert_msg' ] = "fetch failed";
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>

        </table>
        
        <div class="row">
            <div class="col">
                <a href="user-list.php" class="btn btn-link btn-info">Return To User List</a>
            </div>
            <div class="col text-right">
                <input type="submit" class="btn btn-lg btn-info" name="edituser" value="Update User Info">
            </div>
        </div>

    </form>

</div><!-- end container -->

<?php


require($_SESSION['docroot'].'/_inc/_foot.php');
?>