<?php require_once("include/DB.php");?>
<?php require_once("include/SESSION.php");?>
<?php require_once("include/FUNCTIONS.php");?>
<?php
  function has_header_injections($str){
    return preg_match('/[\r\n]/', $str);
  }
  if(isset($_POST['contact-submit'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
    $msg = $_POST['message'];


    if(has_header_injections($name) || has_header_injections($email)){
      die();
    }

    if(!$name || !$email || !$msg){
      $_SESSION['ErrorMessage']="All fields required";
      $_SESSION['contact_name']= $name;
      $_SESSION['contact_email']= $email;
      $_SESSION['contact_msg']= $msg;
      Redirect_to("ContactUs.php");
    }else if(!preg_match('/^[a-zA-Z\s]*$/',$name)) {
      $_SESSION['ErrorMessage']="Name must contain only letters!";
      $_SESSION['contact_name']= $name;
      $_SESSION['contact_email']= $email;
      $_SESSION['contact_msg']= $msg;
      Redirect_to("ContactUs.php");
    }else if(strlen($name)<3 || strlen($name)>20) {
      $_SESSION['ErrorMessage']="Name must have 3 - 20 signs!";
      $_SESSION['contact_name']= $name;
      $_SESSION['contact_email']= $email;
      $_SESSION['contact_msg']= $msg;
      Redirect_to("ContactUs.php");
    }else if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email)){
      $_SESSION['ErrorMessage']="Wrong email adress!";
      $_SESSION['contact_name']= $name;
      $_SESSION['contact_email']= $email;
      $_SESSION['contact_msg']= $msg;
      Redirect_to("ContactUs.php");
    }else if( (strlen($msg)<5)){
      $_SESSION['ErrorMessage']="Your message must have more than 5 signs!";
      $_SESSION['contact_name']= $name;
      $_SESSION['contact_email']= $email;
      $_SESSION['contact_msg']= $msg;
      Redirect_to("ContactUs.php");
    }else{

    $to = "krzysztof10i11@o2.pl";
    $subject = "$name sent you a message via your contact form";
    $message = "Name: $name <br>\r\n";
    $message .= "Email: $email <br>\r\n";
    $message .= "Message: $msg <br>\r\n";

    if(isset($_POST['subscribe']) && $_POST['subscribe']='Subscribe'){
      $message.="<br>\r\n\r\n Please add $email to the mailing list. \r\n";
    }
    $headers  = "MIME-Version: 1.0 ". "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: $name  <$email>" . "\r\n";
    $headers .= "X-Priority: 1". "\r\n";
    $headers .= "X-MSMail-Priority: Highs". "\r\n";
    mail($to, $subject, $message, $headers);
    $_SESSION['SuccessMessage']="Thanks for contacting with us!";
    Redirect_to("ContactUs.php");

    }
  }
?>

<!DOCTYPE>
<html>
  <head>
    <title>Contact Us</title>
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
            <li><a href="AboutUs.php">About Us</a></li>
            <li class="active"><a href="ContactUs.php">Contact Us</a></li>
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
          <h2 class="center-block">Contact Us</h2>
          <div class="messages">
            <?php echo Message(); ?>
            <?php echo SuccessMessage(); ?>
          </div>
          <div class="contact">
              <br>
              <br>
            <form method="post" action="" id="contact-form">
              <fieldset>
                <div class="form-group">
                  <label for='name'>Your name</label>
                  <input class="form-control" type='text' id='name' name='name' value="<?php
                    if (isset($_SESSION['contact_name']))
                    {
                      echo $_SESSION['contact_name'];
                      unset($_SESSION['contact_name']);
                    }
                    ?>">
                </div>
                <div class="form-group">
                <label for='email'>Your email</label>
                <input class="form-control" type='email' id='email' name='email' value="<?php
                  if (isset($_SESSION['contact_email']))
                  {
                    echo $_SESSION['contact_email'];
                    unset($_SESSION['contact_email']);
                  }
                  ?>">
                </div>
                <div class="form-group">
                <label for='message'>Your message</label>
                <textarea class="form-control" id='message' name='message'>
                  <?php
                    if (isset($_SESSION['contact_msg']))
                    {
                      echo $_SESSION['contact_msg'];
                      unset($_SESSION['contact_msg']);
                    }
                    ?>
                </textarea>
                </div>
                <div class="form-group">
                <label class="subscribe" for='subscribe'>
                <input  type='checkbox' id='subscribe' name='subscribe' value='Subscribe'>
                <?php echo strtoupper('Subscribe to newsletter')?></label>
                </div>
                <input class="btn-primary btn-lg center-block" type='submit' name='contact-submit' value='Send message'>

              </fieldset>
            </form>
          </div>

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
