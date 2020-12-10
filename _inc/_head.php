<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>
        <?php
			echo $pgtitle ? $pgtitle : "GYFL - Gilbert Youth Flag Football";
		?>
    </title>
    <script src="https://kit.fontawesome.com/81e46e6ccb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="/style/style.css?v=<?php echo time();?>">

</head>

<body>
    <?php func_dbgr(); ?>
    <?php 
        if(isset($_SESSION['loggedin'])) {
            include_once($_SESSION['docroot'].'/_inc/navbar_user.php'); 
        } else {
            include_once($_SESSION['docroot'].'/_inc/navbar.php'); 
        }
    ?>

<!--<nav><img src="/images/gyfl-logo-blk.jpg" style="width:150px; height:auto;"></nav>-->