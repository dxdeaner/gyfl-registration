<?php

session_start();
session_destroy();

header('Location: login.php');

?>

<script>
    /*window.location.href = "/index.php";*/
</script>
