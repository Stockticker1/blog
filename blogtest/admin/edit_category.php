<?php include 'includes/header.php'; ?>

<?php 
 //creating DB Object 
$id = $_GET['id'];
$db = new Database(); 

//creating query

$query = "SELECT * FROM categories WHERE id = ".$id;

//run query

$category = $db->select($query)->fetch_assoc();

//creating query

$query = "SELECT * FROM categories";

//run query

$categories = $db->select($query);

?>

<?php 
    if (isset($_POST['submit'])) {
    //assign vars
     $name = mysqli_real_escape_string($db->link, $_POST['name']);
     //simple validation
    if ($name == '') {
        //set errorr
        $error = 'Please fill out the form';
} else {
    $query = "UPDATE categories
                SET
                name = '$name'
                WHERE id =".$id;
      
    $update_row = $db->update($query);
}
}
?>

<?php 
    if (isset($_POST['delete'])) {
    
        $query = "DELETE FROM categories 
                  WHERE id = ".$id;
        
        $delete_row = $db->delete($query);
    }
        
?>


<form class="form-horizontal" method="post" action="edit_category.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name ='name' type="text" class="form-control" placeholder="Type category name" value="<?php echo $category['name']; ?>" >
  </div>

  <div>
        <button name="submit" type="submit" class="btn btn-default">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name='delete' type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>