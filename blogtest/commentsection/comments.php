
<?php 
function setComments($conn){
    if(isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments(uid, date, message) 
        VALUES ('$uid', '$date', '$message')";
        $result = mysqli_query($conn,$sql);
         header("Location: ".$_SERVER["HTTP_REFERER"]);
    } 
}

function getComments ($conn) {
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn,$sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2= "SELECT * FROM user WHERE id='$id'";
        $result2 = mysqli_query($conn,$sql2);
        if($row2 = $result2->fetch_assoc()) {
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