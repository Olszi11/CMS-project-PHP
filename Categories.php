<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php Confirm_Login()?>
<?php
  if(isset($_POST['Submit'])){
    $Category=mysqli_real_escape_string($connection,$_POST["Category"]);
    date_default_timezone_set("Europe/Warsaw");
    $CurrentTime=time();
    $DateTime=strftime("%d/%m/%Y %H:%M:%S",$CurrentTime);
    $Admin=$_SESSION['Username'];
    if(empty($Category)){
      $_SESSION['ErrorMessage']="Field must be filled out";
      $_SESSION['fr_category']= $Category;
      Redirect_to("Categories.php");
    }else if(strlen($Category)>99){
      $_SESSION['ErrorMessage']="Too long name for category";
      $_SESSION['fr_category']= $Category;
      Redirect_to("Categories.php");
    }else if(!preg_match("/^[a-zA-Z]*$/",$Category)){
      $_SESSION['ErrorMessage']="Category name must contain only letters (without white spaces)!";
      $_SESSION['fr_category']= $Category;
      Redirect_to("Categories.php");
    }else{
      global $connection;
      $Query="INSERT INTO category (date_time, name, creatorname) VALUES ('$DateTime','$Category','$Admin')";
      $execute=mysqli_query($connection,$Query);
      if($execute){
        $_SESSION['SuccessMessage']="Category added successfully";
        Redirect_to("Categories.php");
      }else{
        $_SESSION['ErrorMessage']="Category failed to add";
        $_SESSION['fr_category']= $Category;
        Redirect_to("Categories.php");
      }
    }
    mysqli_close($connection);
  }
?>
<!DOCTYPE>
<html>
  <head>
      <title>Menage Categories</title>
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
          <form action="Blog.php?Page=1" method="GET" class="navbar-form navbar-right">
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
            <li class="active"><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
            <li><a href="Admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
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
          <h1>Manage Categories</h1>
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <div>
            <form action="Categories.php" method="POST">
              <fieldset>
                <div class="form-group">
                  <label for="categoryname"><span class="fieldInfo">Name:</span></label>
                  <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name" value="<?php
                    if (isset($_SESSION['fr_category']))
                    {
                      echo $_SESSION['fr_category'];
                      unset($_SESSION['fr_category']);
                    }
                    ?>">
                </div>
                <br>
                <input class="btn btn-success center-block btn-lg" type="Submit" name="Submit" value="Add new category">
              </fieldset>
              <br>
            </form>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>Sr No.</th>
                <th>Date & Time</th>
                <th>Category Name</th>
                <th>Creator Name</th>
                <th>Action</th>

              </tr>
              <?php
                global $connection;
                $ViewQuery="SELECT * FROM category ORDER BY id desc";
                $execute=mysqli_query($connection,$ViewQuery);
                $SrNo=0;
                while($DataRows=mysqli_fetch_array($execute)){
                  $Id=$DataRows['id'];
                  $Date_Time=$DataRows['date_time'];
                  $CategoryName=$DataRows['name'];
                  $CreatorName=$DataRows['creatorname'];
                  $SrNo++;
              ?>
                  <tr>
                    <td><?php echo $SrNo?></td>
                    <td><?php echo $Date_Time?></td>
                    <td><?php echo $CategoryName?></td>
                    <td><?php echo $CreatorName?></td>
                    <td><a href="DeleteCategory.php?id=<?php echo $Id;?>"><span class='btn btn-danger'>Delete</span></a></td>
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
