<?php
// Verifică dacă există parametrul 's' sau 'search' în URL
$search_query = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : (isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '');

// Titlul paginii va include fraza de căutare, dacă există
$title = $search_query ? "Search results for: " . $search_query : "No search query";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include("includes/search-form.php"); ?>

    <div class="container mt-4">
        <h1><?php echo $title; ?></h1>

        <!-- Include încă o dată formularul de search -->
        <?php include("includes/search-form.php"); ?>

        <div class="search-results mt-4">
            <?php if ($search_query): ?>
            <?php if (strlen($search_query) < 3): ?>
            <p>Fraza de căutare este prea scurtă. Vă rugăm să introduceți cel puțin 3 caractere pentru a efectua o
                căutare.</p>
            <?php else: ?>
            <p>Rezultatele căutării pentru: <strong><?php echo $search_query; ?></strong></p>
            <!-- Aici se face căutarea folosind array_filter -->
            <?php
                    // Citim lista de filme dintr-un fișier JSON
                    $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];

                    // Filtrăm filmele care conțin fraza de căutare în titlu
                    $filtered_movies = array_filter($movies, function($movie) use ($search_query) {
                        return stripos($movie['title'], $search_query) !== false;
                    });

                    // Verificăm dacă au fost găsite filme
                    if (count($filtered_movies) > 0) {
                        foreach ($filtered_movies as $movie) {
                            echo '<div class="movie-item">';
                            echo '<h3>' . htmlspecialchars($movie['title']) . '</h3>';
                            echo '<p>' . htmlspecialchars($movie['plot']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Zero rezultate pentru căutarea "<strong>' . htmlspecialchars($search_query) . '</strong>".</p>';
                        echo '<p>Vă rugăm să reformulați căutarea și să încercați din nou.</p>';
                    }
                    ?>
            <?php endif; ?>
            <?php else: ?>
            <p>Ați ajuns pe această pagină fără să introduceți o frază de căutare. Vă rugăm să folosiți formularul de
                mai sus pentru a căuta ceva.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>