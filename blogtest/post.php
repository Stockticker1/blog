<?php include 'includes/header.php'; ?>
<?php include 'commentsection/comments.php'; ?>
<?php 
 //creating DB Object 
$id = $_GET['id'];
$db = new Database(); 
//creating query
$query = "SELECT * FROM posts WHERE id = ".$id;
//run query
$post = $db->select($query)->fetch(PDO::FETCH_ASSOC);
//creating query
$query = "SELECT * FROM categories";
//run query
$categories = $db->select($query);
?>
<div class="blog-post">
  <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
  <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author']; ?></a></p>
  <?php echo $post['body'];?>
</div><!-- /.blog-post -->

<?php
if(isset($_SESSION['id'])) {
  //enable commenting (comment form) if user is logged in
  echo  "<form method='POST' action='".setComments($db->connect())."'>
  <input type='hidden' name='uid' value=".$_SESSION['id'].">
  <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
  <textarea name='message' class='form-control' rows='3'></textarea>
  <br>
  <button type='submit' name='commentSubmit'>Comment</button>
  </form>
  <br>";
} else { 
  echo "<div class='panel panel-default'><div class='panel-body text-center'>Log in to leave a comment.</div></div>";
}
//show comments
getComments($db->connect());
?>
<?php include 'includes/footer.php'; ?>
