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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    
    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All posts</a>
            <?php if (!isset($_SESSION['id'])) {
                echo '<a class="blog-nav-item" href="login.php">Log In</a>';
            }
            if (isset($_SESSION['id'])) {
                echo '<span class = "text-success"> Hello, you are logged in.</span>
                <a class="blog-nav-item" href="includes/logout.php">Log Out</a>';
                if($_SESSION['id'] == 1) {
                    echo '<a class="blog-nav-item pull-right" href="admin/index.php">ADMIN PAGE</a>';
                } 
            }
           ?>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
          <div class="logo"><img src = 'images/camera-158471_960_720.png' height = '150'/></div>
        <h1 class="blog-title">Blog about old manual lenses</h1>
        <p class="lead blog-description">   A place, where you can find some information about old Canon and Minolta manual lenses.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">