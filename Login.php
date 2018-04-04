<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php Login_Confirm()?>
<?php
      mysqli_report(MYSQLI_REPORT_STRICT);
      if(isset($_POST['Submit'])){
        global $connection;
        if ($connection->connect_errno!=0){
    			throw new Exception(mysqli_connect_errno());
    		}else{
          $Username = $_POST['Username'];
			    $Password = $_POST['Password'];
          $Username = htmlentities($Username, ENT_QUOTES, "UTF-8");

          if($result=$connection->query(
			       sprintf("SELECT * FROM registration WHERE username='%s'",
			       mysqli_real_escape_string($connection,$Username)))){
               $numRows = $result->num_rows;
               if($numRows>0){
                 $row =$result->fetch_assoc();
                 if (password_verify($Password, $row['password'])){
                   $_SESSION['User_Id']=$row['id'];
                   $_SESSION['Username']=$row['username'];
                   $_SESSION['SuccessMessage']="Welcome {$_SESSION['Username']}";
                   unset($_SESSION['ErrorMessage']);
                  $result->free_result();
                   Redirect_to("dashboard.php");
                 }else{
                   $_SESSION['ErrorMessage']="Invalid username or password";
                   Redirect_to("Login.php");
                 }
               }
             }
             $connection->close();
           }
         }
?>

<!DOCTYPE>
<html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/adminstyles.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <style>
        .fieldInfo{
          color: #1F1F1F;
          font-family: Bitter, Georgia, "Times New Roman", Times, serif;
          font-size: 1.2em;
        }
        body{
          background: #fff no-repeat center center fixed; ;
        }
      </style>
  </head>
  <body>
    <div style="height: 10px; background-color: #000;"></div>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="Blog.php">
            <img style="margin-top:-15px;" src="images/olszowy.png" width=220; height=50;>
          </a>
        </div>
      </div>
    </nav>
    <div class="line" style="height: 10px; background-color: #000;"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <br><br><br>
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <h2 class="center-block text-center">Welcome back</h2>
          <div>
            <form action="Login.php" method="POST">
              <fieldset class="login">
                <div class="form-group">
                  <label for="username"><span class="fieldInfo">Username:</span></label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user text-primary"></span>
                      </span>
                      <input class="form-control" type="text" name="Username" id="username" placeholder="Username">
                    </div>
                  </div>
                <div class="form-group">
                  <label for="password"><span class="fieldInfo">Password:</span></label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock text-primary"></span>
                      </span>
                      <input class="form-control" type="password" name="Password" id="password" placeholder="Password">
                    </div>
                </div>
                <br>
                <input class="btn btn-success center-block btn-lg" type="Submit" name="Submit" value="Login">
              </fieldset>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div  style=" position:absolute; bottom:0;"  id="footer">
      <p> Coding by Krzysztof Olszowy | 2018</p>
      <a style="color: #fff; text-decoration:none; cursor: pointer; font-weight: bold;" href="https://github.com/Olszi11" target="_blank">
        <p>This is my github account</p>
      </a>
    </div>
  </body>
</html>
