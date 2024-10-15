<?php
  require_once("includes/header.php");
  $movie_id = isset($_GET['id']) ? intval($_GET['id']) : null;
  
  

// Function to find the movie by its ID
$movie = null;
if ($movie_id) {
    foreach ($movies as $m) {
        if ($m['id'] == $movie_id) {
            $movie = $m;
            break;
        }
    }
}

// Check if a movie was found
if ($movie):
    // Extract the runtime and other details
    $runtime = $movie['runtime'];
?>
<div class="container">
    <h1><?php echo $movie['title']; ?></h1>
    <div class="row">
        <div class="col-3">
            <img src="<?php echo $movie['posterUrl']; ?>" class="card-img-top" alt="<?php echo $movie['title']; ?>">
        </div>
        <div class="col-9">
            <h3><?php echo $movie['year']; ?></h3>
            <h4>Runtime: <?php echo runtime_prettier($runtime); ?></h4>
            <p><?php echo $movie['plot']; ?></p>
            <p><strong>Director:</strong> <?php echo $movie['director']; ?></p>
            <p><strong>Actors:</strong></p>
            <ul>
                <?php
                $actorsArray = explode(', ', $movie['actors']);
                foreach ($actorsArray as $actor) {
                    echo "<li>$actor</li>";
                }
                ?>
            </ul>
            <p><strong>Genres:</strong> <?php echo implode(', ', $movie['genres']); ?></p>
        </div>
    </div>
</div>

<?php else: ?>
<div class="container">
    <div class="alert alert-danger" role="alert">
        Movie not found!
    </div>
</div>
<?php endif; ?>
<?php
  require_once('includes/footer.php');?>