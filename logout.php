<!--code for logging out-->
<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

header("location:index.php");

?>