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
            <li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Categories</a></li>
            <li><a href="Admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Manage Admins</a></li>
            <li class="active"><a href="Comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp;Comments
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
          <h1>Un-Approved Comments</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Approve</th>
                <th>Delete Comment</th>
                <th>Details</th>
              </tr>
            <?php
              global $connection;
              $Query= "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
              $execute=mysqli_query($connection,$Query);
              $SrNo=0;
              while($DataRows=mysqli_fetch_array($execute)){
                $CommentId=$DataRows['id'];
                $DateTimeOfComment=$DataRows['date_time'];
                $CommentatorName=$DataRows['name'];
                $Comment=$DataRows['comment'];
                $CommentedPostId=$DataRows['admin_panel_id'];
                $SrNo++;
            ?>
              <tr>
                <td><?php echo htmlentities($SrNo);?></td>
                <td style="color: #5e5eff;">
                  <?php
                    if(strlen($CommentatorName)>11){
                      $CommentatorName=substr($CommentatorName,0,10).'..';
                    }
                    echo htmlentities($CommentatorName);
                  ?>
                </td>
                <td>
                  <?php
                    if(strlen($DateTimeOfComment)>11){
                      $DateTimeOfComment=substr($DateTimeOfComment,0,11);
                    }
                    echo htmlentities($DateTimeOfComment);
                  ?>
                </td>
                <td>
                  <?php
                    echo htmlentities($Comment)
                  ?>
                </td>
                <td><a href="ApproveComments.php?id=<?php echo $CommentId?>"><span class="btn btn-success">Approve</span></a></td>
                <td><a href="DeleteComments.php?id=<?php echo $CommentId?>"><span class="btn btn-danger">Delete</span></a></td>
                <td><a href="FullPost.php?id=<?php echo $CommentedPostId;?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
              </tr>
            <?php
              }
            ?>
            </table>
          </div>


          <h1>Approved Comments</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Approved By</th>
                <th>Revert Approve</th>
                <th>Delete Comment</th>
                <th>Details</th>
              </tr>
            <?php
              global $connection;
              $Query= "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
              $execute=mysqli_query($connection,$Query);
              $SrNo=0;
              while($DataRows=mysqli_fetch_array($execute)){
                $CommentId=$DataRows['id'];
                $DateTimeOfComment=$DataRows['date_time'];
                $CommentatorName=$DataRows['name'];
                $Comment=$DataRows['comment'];
                $ApprovedBy=$DataRows['approvedby'];
                $CommentedPostId=$DataRows['admin_panel_id'];
                $SrNo++;
            ?>
              <tr>
                <td><?php echo htmlentities($SrNo);?></td>
                <td style="color: #5e5eff;">
                  <?php
                    if(strlen($CommentatorName)>11){
                      $CommentatorName=substr($CommentatorName,0,10).'..';
                    }
                    echo htmlentities($CommentatorName);
                  ?>
                </td>
                <td>
                  <?php
                    if(strlen($DateTimeOfComment)>11){
                      $DateTimeOfComment=substr($DateTimeOfComment,0,11);
                    }
                    echo htmlentities($DateTimeOfComment);
                  ?>
                </td>
                <td>
                  <?php
                    echo htmlentities($Comment);
                  ?>
                </td>
                <td><?php echo htmlentities($ApprovedBy); ?></td>
                <td><a href="DisApproveComments.php?id=<?php echo $CommentId?>"><span class="btn btn-warning">Dis-Approve</span></a></td>
                <td><a href="DeleteComments.php?id=<?php echo $CommentId?>"><span class="btn btn-danger">Delete</span></a></td>
                <td><a href="FullPost.php?id=<?php echo $CommentedPostId;?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
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
