<?php session_start()?>
<?php include '../libraries/Database.php'; ?>
<?php include '../config/config.php'; ?>
<?php
$db = new Database();
$pwd = $_POST['pwd'];
$uid = $_POST['uid'];

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = $db->select($sql);
if(!$result) {
  echo 'Your username or password is incorrect.';
} else if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $_SESSION['id'] = $row['id'];
  if($_SESSION['id'] == 1) {
    header("Location: ../admin/index.php"); 
  } else {
    header("Location: ../index.php");
  }  
}

























?>