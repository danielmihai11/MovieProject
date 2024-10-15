<div class="col-lg-3 col-md-6 col-sm-12 mb-4" id="movie-card-<?php echo $movie['id']; ?>">
    <div class="card">
        <img src="<?php echo $movie['posterUrl']; ?>" class="card-img-top" alt="<?php echo $movie['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
            <p class="card-text">
                <?php 
                // Tăierea textului la 100 de caractere
                $shortPlot = (strlen($movie['plot']) > 100) ? substr($movie['plot'], 0, 100) . '...' : $movie['plot']; 
                echo htmlspecialchars($shortPlot, ENT_QUOTES, 'UTF-8'); 
                ?>
            </p>
            <a class="btn btn-primary" href="movie.php?id=<?php echo $movie['id']; ?>">See movie</a>
        </div>
    </div>
</div>