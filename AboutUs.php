<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>

<!DOCTYPE>
<html>
  <head>
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/publicstyles.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
    .fieldInfo{
      font-family: Bitter, Georgia, "Times New Roman", Times, serif;
      font-size: 1.2em;
    }
    .comment-block{
      background-color: #F6F7F9;
    }
    .comment-info{
      color: #365899;
      font-family: sans-serif;
      font-size: 1.1em;
      font-weight: bold;
      padding-top: 10px;
    }
    .comment{
      padding-bottom: 10px;
      font-size: 1.1em;
      word-wrap: break-word;
      margin-top: -2px;
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
            <li><a href="dashboard.php">Admin Panel</a></li>
            <li><a href="Blog.php?Page=1">Blog</a></li>
            <li class="active"><a href="AboutUs.php">About Us</a></li>
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
    <div class="container">
      <div class="blog-header">
        <h1 class="text-primary"><span class="glyphicon glyphicon-th"></span>CodeBlog</h1>
      </div>
      <div clas="row">
        <div class="col-sm-8"> <!--Main Blog Area-->
          <h2 class="center-block">About Krzysztof</h2>
          <br>
          <br>
          <img class="img-responsive img-circle center-block" src="images/photo.jpg" width="400px" height="400px"/>
          <br>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
          </p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
          </p>
          <br>
          <br>
          <h2 class="center-block">About Grzegorz</h2>
          <br>
          <br>
          <img class="img-responsive img-circle center-block" src="images/photo2.jpg" width="400px" height="400px"/>
          <br>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum euismod quam a sodales.
            Duis imperdiet eros quam, at ullamcorper felis eleifend eget. Suspendisse augue est, mattis in arcu quis, egestas pharetra elit.
          </p>
          <br>
          <br>






        </div><!--Main Area Blog Ending-->
        <div class="col-sm-offset-1 col-sm-3"> <!--Side Area-->

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Categories</h2>
            </div>
            <div class="panel-body">
              <?php
              global $connection;
              $ViewQuery = "SELECT * FROM category ORDER BY date_time desc";
              $execute=mysqli_query($connection,$ViewQuery);
              while($DataRows=mysqli_fetch_array($execute)){
                $CategoryId=$DataRows['id'];
                $CategoryName=$DataRows['name'];
            ?>
                <a href="Blog.php?Category=<?php echo $CategoryName;?>" target="_blank">
                  <span id="heading"><?php echo $CategoryName ?></span>
                </a>
            <?php
              }
            ?>
            </div>
            <div class="panel-footer">
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Recent Posts</h2>
            </div>
            <div class="panel-body background">
              <?php
                global $connection;
                $ViewQuery = "SELECT * FROM admin_panel ORDER BY date_time desc LIMIT 0,5";
                $execute=mysqli_query($connection,$ViewQuery);
                while($DataRows=mysqli_fetch_array($execute)){
                  $IdPost=$DataRows['id'];
                  $TitlePost=$DataRows['title'];
                  $DateTime=$DataRows['date_time'];
                  $ImagePost=$DataRows['image'];
              ?>
                <div>
                  <a href="FullPost.php?id=<?php echo $IdPost; ?>" target="_blank">
                    <img class="pull-left" style="margin-top:10px; margin-left:10px" src="Upload/<?php echo htmlentities($ImagePost);?>" width:"50px" height="50px">
                    <p id="heading" style="margin-left:110px;" ><?php echo htmlentities($TitlePost)?></p>
                  </a>
                    <p class="description" style="margin-left:110px;" >
                      <?php
                        if(strlen($DateTime)>11){
                          $DateTime=substr($DateTime,0,11);
                        }
                        echo htmlentities($DateTime)
                      ?>
                    </p>
                  <hr>

                </div>


              <?php
                }
              ?>
            </div>
            <div class="panel-footer"></div>
          </div>
        </div> <!--Side Area Ending-->
      </div> <!--Row Ending-->
    </div> <!--Container Ending-->
    <div id="footer">

      <p> Coding by Krzysztof Olszowy | 2018</p>
      <a style="color: #fff; text-decoration:none; cursor: pointer; font-weight: bold;" href="https://github.com/Olszi11" target="_blank">
        <p>This is my github account</p>
      </a>
    </div>
  </body>
</html>
