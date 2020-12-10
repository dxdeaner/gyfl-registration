<?php

//echo "Check:: dupecheck 01 | ";

//if(!empty($_SESSION[ 'emailaddress' ])) $emailaddress = $_SESSION[ 'emailaddress' ];
//$result = $conn->query("SELECT * FROM tbl_users WHERE emailaddress = 'ankle@breaker.com'");

function func_dupecheck($conn, $email) {

    //echo "Check:: dupecheck 02 | ";

    $sql = "SELECT id FROM tbl_users WHERE emailaddress = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Dupe
        $_SESSION['doesitexist'] = 'y';
    } else {
        // Not A Dupe
        $_SESSION['doesitexist'] = 'n';
    }

    //error?
    if (mysqli_connect_errno()) {
        $_SESSION[ 'alertMe' ] = 1;
        $_SESSION[ 'alert_type' ] = 'danger';
        $_SESSION[ 'alert_msg' ] .= "<br>Failed to Check for dupes: " . mysqli_connect_error();
    } else {
        //$_SESSION[ 'alertMe' ] = 1;
        $_SESSION[ 'alert_type' ] = 'success';
        $_SESSION[ 'alert_msg' ] .= "<br>Yes I checked for dupes";
    }

}

//if(!empty($_SESSION[ 'emailaddress' ])) func_dupecheck($conn, $_SESSION[ 'emailaddress' ]);


