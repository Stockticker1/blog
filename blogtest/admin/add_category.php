
<?php include 'includes/header.php'; ?>

<?php 
 //creating DB Object    
$db = new Database(); 
 
    if (isset($_POST['submit'])) {
        //assign vars
         $name = mysqli_real_escape_string($db->link, $_POST['name']);
         //simple validation
        if ($name == '') {
            //set errorr
            $error = 'Please fill out the form';
    } else {
          //updating table 'categories'
        $query = "INSERT INTO categories
                   (name)
                   VALUES ('$name')";
        $update_row = $db->update($query);
    }
    }
    
?>


<form class="form-horizontal" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name ='name' type="text" class="form-control" placeholder="Type category name">
  </div>
  <div>
    <button name="submit" type="submit" class="btn btn-default">Submit</button>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
    <br>
</form>


<?php include 'includes/footer.php'; ?>