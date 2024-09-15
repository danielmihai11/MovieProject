<div style="padding-left:20px" class="col-sm-6 col-md-3 col-lg-2 mb-4" id="movie_nr<?php echo $id;?>">
    <div class="card">
        <img src="<?php echo $movie["poster"];?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $movie["title"];?></h5>
            <p class="card-text flex-grow"><?php echo $movie["description"].="...";?></p>
            <a href="<?php echo $movie["permalink"];?>" class="btn btn-primary mt-auto">View movie</a>
        </div>
    </div>
</div>