<?php session_start()?>
<?php include '../libraries/Database.php'; ?>
<?php include '../config/config.php'; ?>
<?php
$db = new Database();
//taking information from form
$first = $_POST['first'];
$last = $_POST['last'];
$pwd = $_POST['pwd'];
$uid = $_POST['uid'];
//checking if fields are not empty and uid is unique
if(empty($first)||empty($last)||empty($pwd)||empty($uid)){
  header("Location: ../register.php?error=empty");
  echo "Please fill out all fields in a registration form";
  exit();
} else {
  //checking if name already exists
  $sql = "SELECT uid FROM user WHERE uid='$uid'";
  $result = $db->select($sql);
  if ($result) {
    header("Location: ../register.php?error=username");
    exit();
  } else {
    //putting vaues into database
    $sql = "INSERT INTO user(first, last, pwd, uid) 
    VALUES ('$first', '$last', '$pwd', '$uid')";
    $result = $db->link->exec($sql);
    header("Location: ../login.php");
  }  
}


























?>