<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php Confirm_Login()?>
<?php
  if(isset($_POST['Submit'])){
    $Title=mysqli_real_escape_string($connection,$_POST["Title"]);
    $Category=mysqli_real_escape_string($connection,$_POST["Category"]);
    $Post=mysqli_real_escape_string($connection,$_POST["Post"]);
    date_default_timezone_set("Europe/Warsaw");
    $CurrentTime=time();
    $DateTime=strftime("%d/%m/%Y %H:%M:%S",$CurrentTime);
    $Admin="Krzysztof Olszowy";
    $DeleteIdFromURL=$_GET['Delete'];
    $Image=$_FILES["Image"]["name"];
    $TargetImages="Upload/".basename($_FILES["Image"]["name"]);
    global $connection;
    $DeleteFromURL=$_GET['Delete'];
    $Query="DELETE from admin_panel WHERE id='$DeleteFromURL'";
    $execute=mysqli_query($connection,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"],$TargetImages);
    if($execute){
      $_SESSION['SuccessMessage']="Post deleted successfully";
      Redirect_to("Dashboard.php");
    }else{
      $_SESSION['ErrorMessage']="Something goes wrong. Try again!";
      Redirect_to("Dashboard.php");
    }
  }
?>
<!DOCTYPE>
<html>
  <head>
      <title>Delete Post</title>
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
            <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp;Dashboard</a></li>
            <li><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Add New Post</a></li>
            <li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;Live Blog</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
          </ul>
        </div>

        <div class="col-sm-10">
          <h1>Delete Post</h1>
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <div>
            <?php
              global $connection;
              $SearchQueryParameter=$_GET['Delete'];
              $Query="SELECT * FROM admin_panel WHERE id='$SearchQueryParameter'";
              $execute=mysqli_query($connection,$Query);
              while($DataRows=mysqli_fetch_array($execute)){
                $TitleUpdate=$DataRows['title'];
                $CategoryUpdate=$DataRows['category'];
                $ImageUpdate=$DataRows['image'];
                $PostUpdate=$DataRows['post'];
              }
            ?>
            <form action="DeletePost.php?Delete=<?php echo $SearchQueryParameter;?>"  method="POST" enctype="multipart/form-data">
              <fieldset>
                <div class="form-group">
                  <label for="title"><span class="fieldInfo">Title:</span></label>
                  <input disabled value="<?php echo $TitleUpdate;?>" class="form-control" type="text" name="Title" id="title" placeholder="Title">
                </div>
                <div class="form-group">
                  <span class="fieldInfo"> Existing Category: </span>
                  <?php  echo $CategoryUpdate;?>
                  <br>
                  <label for="categoryselect"><span class="fieldInfo">Category:</span></label>
                  <select disabled class="form-control" name="Category" id="categoryselect">
                    <?php
                      global $connection;
                      $ViewQuery="SELECT * FROM category ORDER BY id desc";
                      $execute=mysqli_query($connection,$ViewQuery);

                      while($DataRows=mysqli_fetch_array($execute)){
                        $Id=$DataRows['id'];
                        $CategoryName=$DataRows['name'];
                    ?>
                        <option><?php echo $CategoryName?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <span class="fieldInfo"> Existing Image: </span>
                  <img src="Upload/<?php  echo $ImageUpdate;?>" width="120px" height="60px">
                  <br>
                  <label for="imageselect"><span class="fieldInfo">Select Image:</span></label>
                  <input disabled class="form-control" type="File" name="Image" id="imageselect">
                </div>
                <div class="form-group">
                  <label for="postarea"><span class="fieldInfo">Post:</span></label>
                  <textarea disabled class="form-control" name="Post" id="postarea">
                    <?php echo $PostUpdate;?>
                  </textarea>
                </div>


                <br>
                <input class="btn btn-danger btn-bg center-block" type="Submit" name="Submit" value="Delete Post">
              </fieldset>
              <br>
            </form>
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
