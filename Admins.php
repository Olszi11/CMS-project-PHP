<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php Confirm_Login()?>
<?php
  if(isset($_POST['Submit'])){
    $Username=mysqli_real_escape_string($connection,$_POST["Username"]);
    $Password=mysqli_real_escape_string($connection,$_POST["Password"]);
    $ConfirmPassword=mysqli_real_escape_string($connection,$_POST["ConfirmPassword"]);
    date_default_timezone_set("Europe/Warsaw");
    $CurrentTime=time();
    $DateTime=strftime("%d/%m/%Y %H:%M:%S",$CurrentTime);
    $Admin=$_SESSION['Username'];
    if(empty($Username) || empty($Password) || empty($ConfirmPassword)){
      $_SESSION['ErrorMessage']="Field must be filled out";
      $_SESSION['fr_username']= $Username;
      Redirect_to("Admins.php");
    }else if(strlen($Username)>20){
      $_SESSION['ErrorMessage']="Too long username!";
      $_SESSION['fr_username']= $Username;
      Redirect_to("Admins.php");
    }else if(strlen($Password)<4){
      $_SESSION['ErrorMessage']="Password should have minimum 4 characters!";
      $_SESSION['fr_username']= $Username;
      Redirect_to("Admins.php");
    }else if($Password!==$ConfirmPassword){
      $_SESSION['ErrorMessage']="Password and ConfirmPassword must be the same!";
      $_SESSION['fr_username']= $Username;
      Redirect_to("Admins.php");
    }else{

      global $connection;
      $hashPassword = password_hash($Password, PASSWORD_DEFAULT);
      if ($connection->connect_errno!=0){
    		throw new Exception(mysqli_connect_errno());
    	}else{
        $result = $connection->query("SELECT id FROM registration WHERE username='$Username'");
        if(!$result) throw new Exception($connection->error);
        $user_rows = $result->num_rows;
        if($user_rows>0){
          $_SESSION['ErrorMessage']="This username already exists! Choose another one.";
          Redirect_to("Admins.php");
        }else{
          if($connection->query("INSERT INTO registration (date_time, username, password, addedby) VALUES ('$DateTime','$Username','$hashPassword', '$Admin')")){
            $_SESSION['SuccessMessage']="Admin added successfully";
            Redirect_to("Admins.php");
          }else{
            throw new Exception($connection->error);
            $_SESSION['ErrorMessage']="Admin failed to add";
            $_SESSION['fr_username']= $Username;
            Redirect_to("Admins.php");
          }
        }
      }
    }
    mysqli_close($connection);
  }
?>
<!DOCTYPE>
<html>
  <head>
      <title>Menage Admins</title>
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
      </style>
  </head>
  <body>
    <div style="height: 10px; background-color: #000;"></div>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Blog.php">
            <img style="margin-top:-15px;" src="images/olszowy.png" width=220; height=50;>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">Admin Panel</a></li>
            <li><a href="Blog.php?Page=1" target="_blank">Blog</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
          </ul>
          <form action="Blog.php" method="GET" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" name="Search" class="form-control" placeholder="Search">
            </div>
            <button class="btn btn-default" name="SearchButton">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="line" style="height: 10px; background-color: #000;"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <br>
          <br>
          <ul id="Side_Menu" class="nav nav-pills nav-stacked">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;Dashboard</a></li>
            <li><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add New Post</a></li>
            <li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
            <li class="active"><a href="Admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
            <li><a href="Comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments
                <?php
                  $connection;
                  $QueryTotalUnApproved= "SELECT COUNT(*) FROM comments WHERE status='OFF'";
                  $executeTotalUnApproved=mysqli_query($connection,$QueryTotalUnApproved);
                  $RowsTotalUnApproved=mysqli_fetch_array($executeTotalUnApproved);
                  $TotalUnApproved=array_shift($RowsTotalUnApproved);
                  if($TotalUnApproved>0){
                ?>
                <span class="label label-warning">
                  <?php
                    echo $TotalUnApproved;
                  ?>
                </span>
                <?php
                  }
                ?>
              </a>
            </li>
            <li><a href="Blog.php?Page=1"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live Blog</a></li>
            <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
          </ul>
        </div>

        <div class="col-sm-10">
          <h1>Manage Admins</h1>
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <div>
            <form action="Admins.php" method="POST">
              <fieldset>
                <div class="form-group">
                  <label for="username"><span class="fieldInfo">Username:</span></label>
                  <input class="form-control" type="text" name="Username" id="username" placeholder="Username" value="<?php
                    if (isset($_SESSION['fr_username']))
                    {
                      echo $_SESSION['fr_username'];
                      unset($_SESSION['fr_username']);
                    }
                    ?>">
                </div>
                <div class="form-group">
                  <label for="password"><span class="fieldInfo">Password:</span></label>
                  <input class="form-control" type="password" name="Password" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confirmpassword"><span class="fieldInfo">Confirm Password:</span></label>
                  <input class="form-control" type="password" name="ConfirmPassword" id="confirmpassword" placeholder="Confirm Password">
                </div>
                <br>
                <input class="btn btn-success btn-lg center-block" type="Submit" name="Submit" value="Add new Admin">
              </fieldset>
              <br>
            </form>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>Sr No.</th>
                <th>Date & Time</th>
                <th>Admin Name</th>
                <th>Added By</th>
                <th>Action</th>
              </tr>
              <?php
                global $connection;
                $ViewQuery="SELECT * FROM registration ORDER BY id desc";
                $execute=mysqli_query($connection,$ViewQuery);
                $SrNo=0;
                while($DataRows=mysqli_fetch_array($execute)){
                  $Id=$DataRows['id'];
                  $Date_Time=$DataRows['date_time'];
                  $Username=$DataRows['username'];
                  $Admin=$DataRows['addedby'];
                  $SrNo++;
              ?>
                  <tr>
                    <td><?php echo $SrNo?></td>
                    <td><?php echo $Date_Time?></td>
                    <td><?php echo $Username?></td>
                    <td><?php echo $Admin?></td>
                    <td><a href="DeleteAdmin.php?id=<?php echo $Id;?>"><span class='btn btn-danger'>Delete</span></a></td>
                  </tr>
              <?php
                }
              ?>
            </table>
          </div>


        </div>
      </div>
    </div>



    <div id="footer">

      <p> Coding by Krzysztof Olszowy | 2018</p>
      <a style="color: #fff; text-decoration:none; cursor: pointer; font-weight: bold;" href="https://github.com/Olszi11" target="_blank">
        <p>This is my github account</p>
      </a>
    </div>
  </body>
</html>
