<?php session_start()?>
<?php  
//connection to the database
   $conn = mysqli_connect("localhost", "root", "", "blogtest");

?>


<?php 
$pwd = $_POST['pwd'];
$uid = $_POST['uid'];

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($conn,$sql);

if(!$row = mysqli_fetch_assoc($result)) {
    echo 'Your username or password is incorrect.';
} else {
    $_SESSION['id'] = $row['id'];
    if($_SESSION['id'] == 1) {
       header("Location: ../admin/index.php"); 
    } else {
       header("Location: ../index.php");
    }
    
}

























?>