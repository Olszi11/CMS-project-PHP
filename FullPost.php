<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php
  if(isset($_POST['Submit'])){
    $Name=mysqli_real_escape_string($connection,$_POST["Name"]);
    $Email=mysqli_real_escape_string($connection,$_POST["Email"]);
    $EmailB = filter_var($Email,FILTER_SANITIZE_EMAIL);
    $Comment=mysqli_real_escape_string($connection,$_POST["Comment"]);
    date_default_timezone_set("Europe/Warsaw");
    $CurrentTime=time();
    $DateTime=strftime("%d/%m/%Y %H:%M:%S",$CurrentTime);
    $PostId=$_GET['id'];
    if(empty($Name) || empty($Email) || empty($Comment)){
      $_SESSION['ErrorMessage']="All fields are required";
      $_SESSION['fr_name']= $Name;
      $_SESSION['fr_email']= $Email;
      $_SESSION['fr_comment']= $Comment;
      Redirect_to("FullPost.php?id=$PostId");
    }else if(strlen($Comment)>500){
      $_SESSION['ErrorMessage']="Only 500 characters are allowed in your comment";
      $_SESSION['fr_name']= $Name;
      $_SESSION['fr_email']= $Email;
      $_SESSION['fr_comment']= $Comment;
      Redirect_to("FullPost.php?id=$PostId");
    }else if(!preg_match("/^[a-zA-Z]*$/", $Name)){
      $_SESSION['ErrorMessage']="Name must contain only letters (without white spaces)!";
      $_SESSION['fr_name']= $Name;
      $_SESSION['fr_email']= $Email;
      $_SESSION['fr_comment']= $Comment;
      Redirect_to("FullPost.php?id=$PostId");
    }else if((filter_var($EmailB, FILTER_VALIDATE_EMAIL)==false)||($EmailB!=$Email)){
      $_SESSION['ErrorMessage']="Wrong email adress!";
      $_SESSION['fr_name']= $Name;
      $_SESSION['fr_email']= $Email;
      $_SESSION['fr_comment']= $Comment;
      Redirect_to("FullPost.php?id=$PostId");
    }else{
      global $connection;
      $Query="INSERT INTO comments (date_time, name, email, comment, approvedby, status, admin_panel_id) VALUES ('$DateTime', '$Name', '$Email', '$Comment', 'Pending', 'OFF', '$PostId')";
      $execute=mysqli_query($connection,$Query);
      if($execute){
        $_SESSION['SuccessMessage']="Comment submitted successfully";
        Redirect_to("FullPost.php?id=$PostId");
      }else{
        $_SESSION['ErrorMessage']="Something goes wrong. Try again!";
        $_SESSION['fr_name']= $Name;
        $_SESSION['fr_email']= $Email;
        $_SESSION['fr_comment']= $Comment;
        Redirect_to("FullPost.php?id=$PostId");
      }
    }
  }
?>
<!DOCTYPE>
<html>
  <head>
    <title>Full Blog Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/publicstyles.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
    .fieldInfo{
      color: #1F1F1F;
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
            <li><a href="dashboard.php">Home</a></li>
            <li class="active"><a href="Blog.php?Page=1">Blog</a></li>
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
    <div class="container">
      <div class="blog-header">
        <h1 class="text-primary"><span class="glyphicon glyphicon-th"></span>CodeBlog</h1>
      </div>
      <div clas="row">
        <div class="col-sm-8"> <!--Main Blog Area-->
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <?php
            global $connection;
            if(isset($_GET["SearchButton"])){
              $Search=$_GET["Search"];
              $ViewQuery="SELECT * FROM admin_panel
		            WHERE `date_time` LIKE '%$Search%' OR `title` LIKE '%$Search%' OR `author` LIKE '%$Search%'
		              OR `category` LIKE '%$Search%' OR `post` LIKE '%$Search%' ORDER BY `id` desc";
            }else{
              $PostIDFromURL=$_GET['id'];
              $ViewQuery="SELECT * FROM admin_panel WHERE `id`='$PostIDFromURL'";
            }
            $execute=mysqli_query($connection,$ViewQuery);
            while($DataRows=mysqli_fetch_array($execute)){
              $PostId=$DataRows['id'];
              $DateTime=$DataRows['date_time'];
              $Title=$DataRows['title'];
              $Category=$DataRows['category'];
              $Admin=$DataRows['author'];
              $Image=$DataRows['image'];
              $Post=$DataRows['post'];
          ?>
              <div class="blogpost thumbnail">
                <img class="img-responsive img-rounded" src="Upload/<?php echo $Image; ?>">
                <div class="caption">
                  <h1 id="heading"><?php echo htmlentities($Title);?></h1>
                  <p class="description">Category: <?php echo htmlentities($Category);?> Published on <?php echo htmlentities($DateTime); ?> <span> author: <?php echo htmlentities($Admin); ?></span>
                    <?php
                      $connection;
                      $QueryApproved= "SELECT COUNT(*) FROM comments WHERE admin_panel_id='$PostId' AND status='ON'";
                      $executeApproved=mysqli_query($connection,$QueryApproved);
                      $RowsApproved=mysqli_fetch_array($executeApproved);
                      $TotalApproved=array_shift($RowsApproved);
                      if($TotalApproved>0){
                    ?>
                    <span class="pull-right badge">
                      Comments: <?php
                        echo $TotalApproved;
                      ?>
                    </span>
                    <?php
                      }
                    ?>
                  </p>
                  <p class="post">
                    <?php
                      echo nl2br($Post);
                    ?>
                  </p>
                </div>
              </div>
          <?php
            }
          ?>
          <br>
          <br>
          <br>
          <span class="fieldInfo">Comments</span>
          <br>
          <br>
          <?php
            global $connection;
            $PostIdForComments=$_GET['id'];
            $CommentsQuery="SELECT * FROM comments WHERE admin_panel_id='$PostIdForComments' AND status='ON' ORDER BY date_time desc";
            $execute=mysqli_query($connection,$CommentsQuery);
            while($DataRows=mysqli_fetch_array($execute)){
              $CommentDate=$DataRows['date_time'];
              $CommentatorName=$DataRows['name'];
              $Comments=$DataRows['comment'];
          ?>
              <div class="comment-block">
                <img style="margin-left:10px; margin-top:10px;" class="pull-left" src="images/comment.png" width="70px" height="70px">
                <p style="margin-left:90px;" class="comment-info"><?php echo $CommentatorName;?></p>
                <p style="margin-left:90px;" class="description"><?php echo $CommentDate;?></p>
                <p style="margin-left:90px;" class="comment"><?php echo nl2br($Comments);?></p>
              </div>
              <hr>
          <?php
            }
          ?>
          <br>
          <br>
          <p class="fieldInfo">Share your thoughts with us</p>
          <div>
            <form action="FullPost.php?id=<?php echo $PostId;?>" method="POST" enctype="multipart/form-data">
              <fieldset>
                <div class="form-group">
                  <label for="name"><span class="fieldInfo">Name:</span></label>
                  <input class="form-control" type="text" name="Name" id="name" placeholder="Name" value="<?php
                    if (isset($_SESSION['fr_name']))
                    {
                      echo $_SESSION['fr_name'];
                      unset($_SESSION['fr_name']);
                    }
                    ?>">
                </div>
                <div class="form-group">
                  <label for="email"><span class="fieldInfo">Email:</span></label>
                  <input class="form-control" type="email" name="Email" id="email" placeholder="E-mail" value="<?php
                    if (isset($_SESSION['fr_email']))
                    {
                      echo $_SESSION['fr_email'];
                      unset($_SESSION['fr_email']);
                    }
                    ?>">
                </div>
                <div class="form-group">
                  <label for="commentarea"><span class="fieldInfo">Comment:</span></label>
                  <textarea class="form-control" name="Comment" id="commentarea"></textarea>
                </div>
                <br>
                <input class="btn btn-primary" type="Submit" name="Submit" value="Add comment" value="<?php
                  if (isset($_SESSION['fr_comments']))
                  {
                    echo $_SESSION['fr_comments'];
                    unset($_SESSION['fr_comments']);
                  }
                  ?>">
              </fieldset>
              <br>
            </form>
          </div>
          <a href="Blog.php?Page=1"><span style="float:left; margin-bottom: 30px;" class="btn btn-info">&laquo;&laquo; Back to Blog</span></a>




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
