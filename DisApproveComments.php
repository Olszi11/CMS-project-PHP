<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php
  if(isset($_GET['id'])){
    $IdFromURL=$_GET['id'];
    global $connection;
    $Query="UPDATE comments SET status='OFF' WHERE id='$IdFromURL'";
    $execute=mysqli_query($connection,$Query);
    if($execute){
      $_SESSION['SuccessMessage']="Comment disapproved successfully";
      Redirect_to("Comments.php");
    }else{
      $_SESSION['ErrorMessage']="Something goes wrong. Try again!";
      Redirect_to("Comments.php");
    }
  }
?>
