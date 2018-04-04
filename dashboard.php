<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php Confirm_Login()?>
<!DOCTYPE>
<html>
  <head>
      <title>Admin Dashboard</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/adminstyles.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div style="height: 10px; background-color: #000;"></div>
    <nav style="background-color: #1F1F1F;" class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Blog.php?Page=1">
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
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <h1>Admin Dashboard</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No</th>
                <th>Post Title</th>
                <th>Date&Time</th>
                <th>Author</th>
                <th>Category</th>
                <th>Banner</th>
                <th>Comments</th>
                <th>Actions</th>
                <th>Details</th>
              </tr>
              <?php
                global $connection;
                $ViewQuery= "SELECT * FROM admin_panel ORDER BY id desc";
                $execute=mysqli_query($connection,$ViewQuery);
                $SrNo=0;
                while($DataRows=mysqli_fetch_array($execute)){
                  $Id=$DataRows['id'];
                  $DateTime=$DataRows['date_time'];
                  $Title=$DataRows['title'];
                  $Category=$DataRows['category'];
                  $Admin=$DataRows['author'];
                  $Image=$DataRows['image'];
                  $Post=$DataRows['post'];
                  $SrNo++;
              ?>
                  <tr>
                    <td><?php echo $SrNo; ?></td>
                    <td style="color: #5e5eff;">
                      <?php
                        if(strlen($Title)>20){
                          $Title=substr($Title,0,20)."..";
                        }
                        echo $Title;
                      ?>
                    </td>
                    <td>
                      <?php
                        if(strlen($DateTime)>11){
                          $DateTime=substr($DateTime,0,11);
                        }
                        echo $DateTime;
                      ?>
                    </td>
                    <td>
                      <?php
                        if(strlen($Admin)>6){
                          $Admin=substr($Admin,0,6)."..";
                        }
                        echo $Admin;
                      ?>
                    </td>
                    <td>
                      <?php
                        if(strlen($Category)>8){
                          $Category=substr($Category,0,8)."..";
                        }
                        echo $Category;
                      ?>
                    </td>
                    <td><img src="Upload/<?php echo $Image; ?>" width="80px" height="60px"></td>
                    <td>
                      <?php
                        $connection;
                        $QueryApproved= "SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'";
                        $executeApproved=mysqli_query($connection,$QueryApproved);
                        $RowsApproved=mysqli_fetch_array($executeApproved);
                        $TotalApproved=array_shift($RowsApproved);
                        if($TotalApproved>0){
                      ?>
                      <span class="pull-right label label-success">
                        <?php
                          echo $TotalApproved;
                        ?>
                      </span>
                      <?php
                        }
                      ?>

                      <?php
                        $connection;
                        $QueryUnApproved= "SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'";
                        $executeUnApproved=mysqli_query($connection,$QueryUnApproved);
                        $RowsUnApproved=mysqli_fetch_array($executeUnApproved);
                        $TotalUnApproved=array_shift($RowsUnApproved);
                        if($TotalUnApproved>0){
                      ?>
                      <span class=" label label-danger">
                        <?php
                          echo $TotalUnApproved;
                        ?>
                      </span>
                      <?php
                        }
                      ?>
                    </td>
                    <td>
                      <a href="EditPost.php?Edit=<?php echo $Id?>"><span class="btn btn-warning">Edit</span></a>
                      <a href="DeletePost.php?Delete=<?php echo $Id?>"><span class="btn btn-danger">Delete</span></a>
                    </td>
                    <td>
                      <a href="FullPost.php?id=<?php echo $Id;?> " target="_blank"><span class="btn btn-primary">Live Preview</span></a>
                    </td>
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
