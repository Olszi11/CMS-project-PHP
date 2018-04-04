<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php
function Redirect_to($newLocation){
  header("Location:".$newLocation);
  exit;
}
function Login(){
  if(isset($_SESSION['User_Id'])){
    return true;
  }
}
function Confirm_Login(){
  if(!Login()){
    $_SESSION["ErrorMessage"]="Login Required";
    Redirect_to("Login.php");
  }
}
function Login_Confirm(){
  if(Login()){
    Redirect_to("dashboard.php");
  }
}
?>
