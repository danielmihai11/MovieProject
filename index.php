<?php require_once("includes/header.php");?>

<h1 class="welcome-message">
    <?php
    date_default_timezone_set("Europe/Bucharest"); //am setat fusul orar pe Bucuresti
    $current_hour = date("H"); //obtinem ora curenta
    if($current_hour>6 && $current_hour< 12){
        echo "Good Morning!";
    }
    elseif($current_hour> 12 && $current_hour<18){
        echo "Good Afternoon!";
    }
    elseif($current_hour> 17&& $current_hour< 21){
        echo "Good evening!";
    }
    else{
        echo "Good night!";
    }
?>


</h1>
<a class="btn btn-primary" href="movies.php" role="button" style="margin-left:20px;">Movie List</a>
<?php require_once("includes/footer.php"); ?>