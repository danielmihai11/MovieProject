<?php require_once("includes/header.php"); ?>

<h1>Titanic</h1>
<div class="card align-self-center">
    <div class="row">
        <div class="col-sm-3">
            <img src="https://resizing.flixster.com/JBp0dumCJw-ln_HfI4rqvXOagG4=/206x305/v2/https://resizing.flixster.com/j1q6PHK0ZtbdABMQcflU-wH5-eE=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2Y1NGZmNWMyLTczMGUtNDViMS04NzdmLTRiODZiMDM0YWMwOS5qcGc="
                class="img-fluid rounded-start">
        </div>
        <div class="col-sm-9">
            <div class="card-body">
                <h5 class="card-title">Titanic</h5>
                <p class="card-text">James Cameron's "Titanic" is an epic, action-packed romance set against the
                    ill-fated maiden voyage of the R.M.S. Titanic; the pride and joy of the White Star Line and,
                    at the time, the largest moving object ever built. She was the most luxurious liner of her
                    era -- the "ship of dreams" -- which ultimately carried over 1,500 people to their death in
                    the ice cold waters of the North Atlantic in the early hours of April 15, 1912.
                </p>
                <p class="card-text">Released Dec 19, 1970
                    <?php
                $years_old = check_old_movie(1970);
                if($years_old)
                {
                    echo '<h5>Old movie: <span class="badge badge-secondary"> ' . $years_old . ' years</span></h5>';

                }
                ?>
                    <?php echo runtime_prettier(195)?>,
                    History/Drama/Romance
                </p>
                <p class="card-text">Director: James Cameron</p>
                <p class="card-text">The cast: Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates, Gloria
                    Stuart, Frances Fisher </p>
            </div>
        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>