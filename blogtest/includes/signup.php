<?php session_start()?>

<?php  
//connection to the database
   $conn = mysqli_connect("localhost", "root", "", "blogtest");

?>


<?php

//taking information from form
$first = $_POST['first'];
$last = $_POST['last'];
$pwd = $_POST['pwd'];
$uid = $_POST['uid'];
//checking if fields are not empty and uid is unique

if(empty($first)||empty($last)||empty($pwd)||empty($uid)){
    header("Location: ../register.php?error=empty");
    exit();
} 
else {
    //checking if name already exists
    $sql = "SELECT uid FROM user WHERE uid='$uid'";
    $result = mysqli_query($conn,$sql);
    $uidcheck = mysqli_num_rows($result);
    if ($uidcheck > 0) {
        header("Location: ../register.php?error=username");
        exit();
    } else {
        //putting vaues into database
        $sql = "INSERT INTO user(first, last, pwd, uid) 
        VALUES ('$first', '$last', '$pwd', '$uid')";
        $result = mysqli_query($conn,$sql);  
    }  
}


























?>