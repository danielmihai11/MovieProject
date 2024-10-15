<?php 
require_once("includes/header.php"); 

// Decode the JSON file to get movies
$moviesData = json_decode(file_get_contents('./assets/movies-list-db.json'), true);
$movies = $moviesData['movies'];
$genres = $moviesData['genres'];

// Verifică dacă parametrul "genre" există în $_GET și este valid
if (isset($_GET['genre']) && in_array($_GET['genre'], $genres)) {
    $selectedGenre = $_GET['genre'];
    
    // Filtrare filme după gen
    $filteredMovies = array_filter($movies, function($movie) use ($selectedGenre) {
        return in_array($selectedGenre, $movie['genres']);
    });
    
    // Setează titlul paginii
    $pageTitle = htmlspecialchars($selectedGenre) . " Movies";
} else {
    // Dacă nu există gen valid, afișează toate filmele
    $filteredMovies = $movies;
    $pageTitle = "All Movies";
}
?>

<h1><?php echo $pageTitle; ?></h1>
<div class="row d-flex align-items-stretch">
    <?php
    foreach($filteredMovies as $movie) { 
        include("includes/archive-movie.php");
    } 
    ?>
</div>

<?php require_once("includes/footer.php"); ?>