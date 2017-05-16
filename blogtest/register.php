<?php session_start()?>
<?php include 'config/config.php' ?>
<?php include 'libraries/Database.php' ?>
<?php include 'helpers/format_helper.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Welcome to PHP Test Blog</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>

<body>
  <div class="blog-masthead">
    <div class="container">
      <nav class="blog-nav">
        <a class="blog-nav-item" href="index.php">Home</a>
        <a class="blog-nav-item" href="posts.php">All posts</a>
        <a class="blog-nav-item" href="login.php">Log In</a>
      </nav>
    </div>
  </div>
  <div class="container">
    <br>
<?php
//checking if all fields are filled in and if username is taken
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url,'error=empty') !==false){
  echo "Fill out all fields";
} else if (strpos($url,'error=username') !==false) {
  echo "Username already exists";
}
?>     
    <form class="form-horizontal" action="includes/signup.php" method="POST">
      <div class="form-group">
        <label class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-6">
          <input type="text" name="first" class="form-control"  placeholder="Your first name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-6">
          <input type="text" name="last" class="form-control" placeholder="Your last name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nickname</label>
        <div class="col-sm-6">
          <input type="text" name="uid" class="form-control" placeholder="Your nickname (username)">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-6">
          <input type="password" name="pwd" class="form-control" placeholder="Your Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Sign up</button>
        </div>
      </div>
    </form>
  </div>
  <footer class="blog-footer">
    <p>Canon and Minolta lenses</p>
    <p><a href="#">Back to top</a></p>
  </footer>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
