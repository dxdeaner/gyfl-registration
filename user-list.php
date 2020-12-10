<?php
//phpinfo();
require( '_inc/apptop.php' );

$pgtitle = 'Users';

require($_SESSION['docroot'].'/_inc/_head.php');

extract($_GET);
if(!empty($emailaddress)) {
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

	$result = $conn->query( $sql );
    $row = $result->fetch_assoc();

    extract($row);

    foreach($row as $postkey => $postval){
        $_USER[$postkey] = $postval;
    }
    
}

?>

<div class='container'>

    <div class="row table table-dark row p-3">

        <div class="col-1">
            <h4>Search</h4>
        </div>

        <div class="col">
            <form method="GET" action="/user-list.php" class="form-inline">
                <input type="text" name="emailaddress" placeholder="User Email" class="form-control mr-2 float-right">
                <button type="submit" name="" class="btn btn-light"><i class="fas fa-search"></i> Search</button>
            </form>
        </div>

    </div>







    <?php if(!empty($emailaddress)) { ?>

    <div class="row pb-2 mb-3">

        <div class="col">
            <h4 class="bold"><?php echo $_USER["firstname"] ;?> <?php echo $_USER["lastname"] ;?>
            <a href="user-list.php" class="float-right btn btn-secondary ml-3">CLEAR</a>
            <a href="user-edit.php?userID=<?php echo $_USER["userID"] ;?>" class="float-right btn btn-primary">EDIT</a></h4>
           
        </div>

        <div class="w-100 mb-3"></div>

        <div class="col-6">

            <div class="col"><strong>Email:</strong><br>
                <?php echo $_USER["emailaddress"] ;?></div>

            <div class="w-100 mb-3"></div>

            <div class="col"><strong>Phone:</strong><br>
                <?php echo $_USER["phonenumber"] ;?></div>

            <div class="w-100 mb-3"></div>

            <div class="col title_caps"><strong>Role:</strong><br>
                <?php echo $_USER["user_type"] ;?></div>

        </div>

        <div class="col-6">

            <div class="col">
                <strong>Address:</strong><br>
                <?php echo $_USER["user_address1"] ;?> <?php echo $_USER["user_address2"] ;?>
                <br><?php echo $_USER["user_city"] ;?>, <?php echo $_USER["user_st"] ;?>
                <?php echo $_USER["user_zip"] ;?>
            </div>

            <div class="w-100 mb-3"></div>

            <div class="col">
                <strong>League:</strong><br>
                <?php echo $_USER["league_name"] ;?>
            </div>

            <div class="col">
                <strong>Division and Team</strong><br>
                <?php echo $_USER["division_name"] ;?> <?php echo $_USER["team_name"] ;?>
            </div>

        </div>


    </div>

    <?php } ?>











    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col" nowrap>Role</th>
                <th scope="col" nowrap>League</th>
                <th scope="col" nowrap>Division and Team</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>

            <?php

/** 
//2 table join
$sql = "SELECT * FROM tbl_rpgreports JOIN tbl_rpgsalesreps WHERE tbl_rpgsalesreps.id = tbl_rpgreports.id_agent";

// condition
WHERE tbl_users.id_onoff=1
*/

//multi-table join
$sql = "SELECT *, 
    tbl_users.id AS userID,
    tbl_leagues.id AS leagueID,
    tbl_divisions.id AS divisionID,
    tbl_teams.id AS teamID
    FROM ((((tbl_users
    LEFT JOIN tbl_roles ON tbl_users.id_user_role = tbl_roles.id)
    LEFT JOIN tbl_leagues ON tbl_users.id_league = tbl_leagues.id)
    LEFT JOIN tbl_divisions ON tbl_users.id_division = tbl_divisions.id)
    LEFT JOIN tbl_teams ON tbl_users.id_team = tbl_teams.id)
    ";

$result = mysqli_query($conn, $sql);
//echo 'Fetch: 02<br>';


if (mysqli_num_rows($result) > 0) {
    // Fetch one and one row
    //echo 'Fetch: 03<br>';


    while($row = mysqli_fetch_assoc($result)){
        //echo 'Fetch: 04<br>';
        
       ?>
            <tr>
                <th>
                    <?php echo $row["userID"] ;?>
                </th>
                <td>
                    <?php echo $row["firstname"] ;?>
                </td>
                <td>
                    <?php echo $row["lastname"] ;?>
                </td>
                <td><a href="?emailaddress=<?php echo $row["emailaddress"] ;?>" class="btn-link">
                    <?php echo $row["emailaddress"] ;?></a>
                </td>
                <td>
                    <?php echo $row["phonenumber"] ;?>
                </td>
                <td class='title_caps'>
                    <?php echo $row["user_type"] ;?>
                </td>
                <td>
                    <?php echo $row["league_name"] ;?>
                </td>
                <td>
                    <?php echo $row["division_name"] ;?> <?php echo $row["team_name"] ;?>
                </td>
                <td>
                    <a href="user-edit.php?userID=<?php echo $row["userID"] ;?>" type="button" class="btn btn-primary">
                        <i class='fas fa-edit'></i>
                    </a>
                </td>
            </tr>

            <?php


    }

} else {
    $_SESSION[ 'alertMe' ] = 1;
    $_SESSION[ 'alert_type' ] = 'danger';
    $_SESSION[ 'alert_msg' ] = 'no results fetched';
    echo 'no results fetched';
}

?>

        </tbody>
    </table>
</div><!-- end container -->

<?php

require($_SESSION['docroot'].'/_inc/_foot.php');

?>