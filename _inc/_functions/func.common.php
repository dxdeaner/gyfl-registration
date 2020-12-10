<?php 

function func_Redirect_to($New_Location){
  //header("Location :'.$New_Location'");
  ?><script>window.location.href = <?php echo $New_Location; ?></script><?php
  exit;
}
//func_Redirect_to($New_Location);


function func_confirmLogin() {
    if (isset($_SESSION["loggedin"])) {
        return true;
    }  else {
        $alert_msg = 'No Access. Please login first';
        func_alert('danger',$alert_msg);
        ?><script>window.location.href = "/login.php";</script>
     <?php
    }
}
//func_confirmLogin();

/**
function func_getUserDetails($conn) {
  $id = $_SESSION['id'];
  $sql = "SELECT * from tbl_users WHERE id=$id;";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  foreach($row as $postkey => $postval){
    $_SESSION[$postkey] = $postval;
  }
  if (isset($_SESSION['password'])) unset($_SESSION['password']);

}
//func_getUserDetails($conn);
*/



function func_currenttime() {
  $_SESSION['dt'] = date("Y-m-d H:i:s");
}
//func_currenttime(); // returns $dt
