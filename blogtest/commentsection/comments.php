<?php
//setting comments on a page
function setComments($conn){
  if(isset($_POST['commentSubmit'])) {
    $db = new Database();
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];   
    $sql = "INSERT INTO comments(uid, date, message) VALUES ('$uid', '$date', '$message')";
    $result = $db->link->exec($sql);
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  } 
}
//getting comments from a database
function getComments ($conn) {
  $db = new Database();     
  $sql = "SELECT * FROM comments ORDER BY cid DESC";
  $result = $db->select($sql);
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['uid'];
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
      echo "</div>";
      echo "</div>";
    }
  }  
}












?>