<?php include 'includes/header.php'; ?>

<?php 
 //creating DB Object    
$db = new Database(); 
//what's going to happen if submit button is pressed
if (isset($_POST['submit'])) {
    //assign vars
     $title = mysqli_real_escape_string($db->link, $_POST['title']);
     $body = mysqli_real_escape_string($db->link, $_POST['body']);
     $category = mysqli_real_escape_string($db->link, $_POST['category']);
     $author = mysqli_real_escape_string($db->link, $_POST['author']);
     $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
    
     //simple validation if fields are not empty
    if ($title == ''|| $body == ''|| $category == '' || $author == '') {
        //set errorr
        $error = 'Please fill out the form';
} else {
      //putting things into 'posts' table
    $query = "INSERT INTO posts
                (title, body, category, author, tags)
              VALUES ('$title', '$body', $category, '$author', '$tags')";
      
    $insert_row = $db->insert($query);
}
}
    
?>
<?php 

//creating query

$query = "SELECT * FROM categories";

//run query

$categories = $db->select($query);

?>

<form role="form" method="post" action="add_post.php"> 
  <div class="form-group">
    <label>Post title</label>
    <input name='title' type="text" class="form-control"  placeholder="Enter title">
  </div>
  <div class="form-group">
    <label>Post body</label>
    <textarea name='body' class="form-control"  placeholder="Write a body of a post"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name='category'>
    <?php while($row = $categories->fetch_assoc()) : ?>
    <?php 
    //select categories that are equal to default categories
    if ($row['id'] == $post['category']) {
              $selected = 'selected';
            } else {
             $selected = ''; 
            }
    ?>
    <option <?php echo $selected; ?> value = '<?php echo $row['id']; ?>'><?php echo $row['name']; ?></option>
    <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name='author' type="text" class="form-control"  placeholder="Enter author name">
  </div>
    <div class="form-group">
    <label>Tags Field</label>
    <input name='tags' type="text" class="form-control"  placeholder="Enter tags">
  </div>
  <div>
    <button name='submit' type="submit" class="btn btn-default">Submit</button>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
</form>


<?php include 'includes/footer.php'; ?>