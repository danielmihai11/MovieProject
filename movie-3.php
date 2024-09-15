<?php require_once("includes/header.php"); ?>
<h1>Emily in Paris</h1>
<div class="card">
    <div class="row">
        <div class="col-md-3">
            <img src="https://resizing.flixster.com/ZjYt5hW2RWLF8Px-S8b348qEyDg=/206x305/v2/https://resizing.flixster.com/Clm4tCiH0ujV3a93l8fnqHnJJKI=/ems.cHJkLWVtcy1hc3NldHMvdHZzZXJpZXMvZTkwMTNhMDctNThlMi00NWM4LWIwZjQtNGUyNjA4OTU2YTM3LmpwZw=="
                class="img-fluid rounded-start">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title">Emily in Paris</h5>
                <p class="card-text">A young American woman from the Midwest is hired by a marketing firm in
                    Paris to provide them with an American perspective on things.
                </p>
                <p class="card-text">Next Ep Thu Sep 12 2020
                    <?php
                $years_old = check_old_movie(2020);
                if($years_old)
                {
                    echo '<h5>Old movie: <span class="badge badge"> ' . $years_old . ' years</span></h5>';

                }
                ?>
                    <?php echo runtime_prettier(105)?>, 4 Seasons, Comedy/Drama</p>
                <p class="card-text">Director: Darren Star </p>
                <p class="card-text">The cast: Lily Collins, Ashely Park, Lucas Bravo Gabriel, Philippine
                    Leroy-Beaulieu, Bruno Gouery, Camille Razat </p>
            </div>
        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>