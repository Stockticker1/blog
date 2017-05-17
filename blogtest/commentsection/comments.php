<?php
//setting comments on a page
function setComments($db){
  if(isset($_POST['commentSubmit'])) {
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $pid = $_POST['pid'];
    if(!empty($message)) {
      $sql = "INSERT INTO comments(uid, date, message, pid) VALUES ('$uid', '$date', '$message', '$pid')";
      $result = $db->link->exec($sql);
      header("Location: ".$_SERVER["HTTP_REFERER"]);
    } else {
      echo 'Field is empty! Write something in it.';
    }
   
  } 
}
//getting comments from a database
function getComments ($db) {
  $pid = $_GET['id'];     
  $sql = "SELECT * FROM comments WHERE pid = '$pid' ORDER BY cid DESC";
  $result = $db->select($sql);
  if($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['uid'];
    //new query to replace user id in comment table with user name in users table
    $sql2= "SELECT * FROM user WHERE id='$id'";
    $result2 = $db->select($sql2);;
    if($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
      echo"<div class='panel panel-default'>";
      echo "<div class='panel-heading'>";
      echo "<h3 class='panel-title'>".$row2['uid']."</h3>";
      echo "</div>";
      echo "<div class='panel-body'>";
      echo $row['date']."<br>";
      echo $row['message'];
      //delete comment if u are user who wrote this
      if (isset($_SESSION['id']) && $_SESSION['id'] == $row2['id']) {
        echo "<p><form class='delete-button' method='POST' action='".deleteComment($db)."'><input type='hidden' name='cid' value='".$row['cid']."'><button type='submit' name='commentDelete'>Delete</button></form></p>";
      }
      echo "</div>";
      echo "</div>";
    }
  }  
  } else {
    echo "<div class='panel panel-default'><div class='panel-body text-center'>There are no comments under this post yet. Log in and leave your comment. </div></div>";
  }
}

function deleteComment($db) {
  if (isset($_POST['commentDelete'])) {
    $cid = $_POST['cid'];
    $sql = "DELETE FROM comments WHERE cid = '$cid'";
    $result = $db->link->exec($sql);
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  }
  
}
?>