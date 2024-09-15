<?php require_once("includes/header.php"); ?>
<h1>Movies</h1>
<div class="row d-flex align-items-stretch">
    <?php

            $id=1;
    foreach($movies as $movie){ ?>
    <?php include("includes/archive-movie.php"); ?>

    <?php $id++; } ?>
</div>

<?php require_once("includes/footer.php"); ?>