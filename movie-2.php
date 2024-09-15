<?php require_once("includes/header.php"); ?>
<h1>Uncharted</h1>
<div class="card align-center">
    <div class="row">
        <div class="col-md-3">
            <img src="https://resizing.flixster.com/67QFiHz4pD23vTsQ-FXn_F8vRTU=/206x305/v2/https://resizing.flixster.com/Vu0aZW3KXbHGf7icIpKBNYdUExg=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzL2NlYzZhYTRkLTBlNWMtNDBiZC05N2JhLTdjMWE2ODdiNDNiZS5qcGc="
                class="img-fluid rounded-start">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title">Uncharted</h5>
                <p class="card-text">Street-smart thief Nathan Drake (Tom Holland) is recruited by seasoned
                    treasure hunter Victor "Sully" Sullivan (Mark Wahlberg) to recover a fortune lost by
                    Ferdinand Magellan 500 years ago. What starts as a heist job for the duo becomes a
                    globe-trotting, white-knuckle race to reach the prize before the ruthless Moncada (Antonio
                    Banderas), who believes he and his family are the rightful heirs. If Nate and Sully can
                    decipher the clues and solve one of the world's oldest mysteries, they stand to find $5
                    billion in treasure and perhaps even Nate's long-lost brother...but only if they can learn
                    to work together.
                </p>
                <p class="card-text">Released Feb 18, 2022,
                    <?php
                $years_old = check_old_movie(2022);
                if($years_old)
                {
                    echo '<h5>Old movie: <span class="badge badge-secondary"> ' . $years_old . ' years</span></h5>';

                }
                ?>
                    <?php echo runtime_prettier(116)?>, Adventure</p>
                <p class="card-text">Director: Ruben Fleischer </p>
                <p class="card-text">The cast: Tom Holland, Mark Wahlberg, Sophia Ali, Tati Gabrielle, Antonio
                    Banderas </p>
            </div>
        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>