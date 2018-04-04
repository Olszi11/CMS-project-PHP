<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<!DOCTYPE>
<html>
  <head>
    <title>Blog Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/publicstyles.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>

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
          <?php
            global $connection;
            //Search BUtton Active
            if(isset($_GET["SearchButton"])){
              $Search=$_GET["Search"];
              $ViewQuery="SELECT * FROM admin_panel
		            WHERE `date_time` LIKE '%$Search%' OR `title` LIKE '%$Search%' OR `author` LIKE '%$Search%'
		              OR `category` LIKE '%$Search%' OR `post` LIKE '%$Search%' ORDER BY `id` desc";
            //Page Active
            }else if(isset($_GET['Category'])){
              $Category=$_GET['Category'];
              $ViewQuery= "SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc";
            }else if(isset($_GET['Page'])){
              $Page=$_GET['Page'];
              if($Page==0 || $Page<1){
                $ShowPostFrom=0;
              }else{
                $ShowPostFrom=($Page*5)-5;
              }
              $ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,3";
            //DefaultBlog
            }else{
              $ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,3";
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
                  <p class="post"><?php
                    if(strlen($Post)>150){
                      $Post=substr($Post,0,150).'...';
                    }
                    echo $Post; ?>
                  </p>
                </div>
                <a href="FullPost.php?id=<?php echo $PostId; ?>" target="_blank"><span class="btn btn-info">Read More &rsaquo;&rsaquo;</span></a>
              </div>
          <?php
            }
          ?>
          <nav>
            <ul class="pagination pagination-lg pull-left">
              <?php
                if(isset($Page)){
                  if($Page>1){
              ?>
                    <li><a href="Blog.php?Page=<?php echo $Page-1; ?>">&laquo;</a></li>

              <?php
                  }
                }
              ?>
              <?php
               global $connection;
               $QueryPagination = "SELECT COUNT(*) FROM admin_panel";
               $executePagination=mysqli_query($connection,$QueryPagination);
               $RowsPagination=mysqli_fetch_array($executePagination);
               $TotalPosts=array_shift($RowsPagination);
               $PostPerPage=$TotalPosts/5;
               $PostPerPage=ceil($PostPerPage);

               for($i=1; $i<=$PostPerPage; $i++){
                 if(isset($Page)){
                   if($i==$Page){
               ?>
                     <li class="active"><a href="Blog.php?Page=<?php echo $i;?>"><?php echo $i;?></a></li>
               <?php
                }else{
               ?>
                   <li><a href="Blog.php?Page=<?php echo $i;?>"><?php echo $i;?></a></li>
               <?php
                  }
                }else{
                  if($i==1){
                  ?>
                  <li class="active"><a href="Blog.php?Page=<?php echo $i;?>"><?php echo $i;?></a></li>
                  <?php
                }else if($i>1){
                  ?>
                  <li><a href="Blog.php?Page=<?php echo $i;?>"><?php echo $i;?></a></li>
                  <?php
                }
              }
            }
              ?>
              <?php
                if(isset($Page)){
                  if($Page+1<=$PostPerPage){
              ?>
                    <li><a href="Blog.php?Page=<?php echo $Page+1; ?>">&raquo;</a></li>
              <?php
                  }
                }
              ?>
           </ul>
         </nav>
        </div><!--Main Area Blog Ending-->
        <div class="col-sm-offset-1 col-sm-3"> <!--Side Area-->

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Categories</h2>
            </div>
            <div class="panel-body">
              <?php
              global $connection;

              $QueryCount = "SELECT COUNT(*) FROM category";
              $executeCount=mysqli_query($connection,$QueryCount);
              $RowsCount=mysqli_fetch_array($executeCount);
              $TotalCategories=array_shift($RowsCount);

              $ViewQuery = "SELECT * FROM category ORDER BY id desc";
              $execute=mysqli_query($connection,$ViewQuery);
              while($DataRows=mysqli_fetch_array($execute)){
                  $CategoryId=$DataRows['id'];
                  $CategoryName=$DataRows['name'];
                  ?>
                 <a href="Blog.php?Category=<?php echo $CategoryName;?>" target="_blank">
                   <span id="heading"><?php echo $CategoryName?></span>
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
                $ViewQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,5";
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
