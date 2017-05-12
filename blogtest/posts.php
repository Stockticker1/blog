<?php include 'includes/header.php'; ?>
<?php 
    
     //creating DB Object   
    $db = new Database(); 

 //check url for category
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    //creating query

    $query = "SELECT * FROM posts WHERE category = ".$category;

    //run query

    $posts = $db->select($query);

} else {
    //creating query

    $query = "SELECT * FROM posts ORDER BY id DESC";

    //run query

    $posts = $db->select($query);
    
}
    

//creating query

$query = "SELECT * FROM categories";

//run query

$categories = $db->select($query);

?>
<?php if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
            <?php echo shortenText($row['body']); ?>
              <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More..</a>
          </div><!-- /.blog-post -->
    <?php endwhile; ?>  

<?php else : ?>
<p>There are no posts. Yet.</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>


     