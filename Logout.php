<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php
    $_SESSION['SuccessMessage']="Logout successfully";
    unset($_SESSION['User_Id']);
    Redirect_to("Login.php");

?>
