<?php
require_once("includes/header.php");

// Definim calea fișierului JSON
$favorite_file_path = 'assets/movie-favorites.json';

// Funcție pentru citirea datelor din fișierul JSON
function read_favorites_from_file($file_path) {
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        return json_decode($json_data, true);
    }
    return [];
}

// Funcție pentru salvarea datelor în fișierul JSON
function save_favorites_to_file($file_path, $data) {
    file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT));
}

// Procesare formular pentru adăugarea/ștergerea din favorite

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['movie_id']) && isset($_POST['favorite_action'])) {
        $movie_id = intval($_POST['movie_id']);
        $favorite_action = intval($_POST['favorite_action']);

        $favorite_movies = read_favorites_from_file($favorite_file_path);

        if ($favorite_action == 1) {
            // Incrementare sau adăugare
            if (isset($favorite_movies[$movie_id])) {
                $favorite_movies[$movie_id]++;
            } else {
                $favorite_movies[$movie_id] = 1;
            }
        } else if ($favorite_action == 0) {
            // Decrementare sau ștergere
            if (isset($favorite_movies[$movie_id])) {
                if ($favorite_movies[$movie_id] > 1) {
                    $favorite_movies[$movie_id]--;
                } else {
                    unset($favorite_movies[$movie_id]);
                }
            }
        }

        save_favorites_to_file($favorite_file_path, $favorite_movies);
    }
}



// Preluăm ID-ul filmului cu GET
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

    // Verificăm dacă filmul este în lista de favorite
    $favorite_movies = read_favorites_from_file($favorite_file_path);
    $is_favorite = isset($favorite_movies[$movie['id']]);
    $favorite_count = $is_favorite ? $favorite_movies[$movie['id']] : 0;
?>
<div class="container">
    <h1><?php echo $movie['title']; ?></h1>
    <div>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
            <input type="hidden" name="favorite_action" value="1">
            <button type="submit"> Adaugă la favorite
                <span class="badge bg-secondary"><?php echo $favorite_count; ?></span>
            </button>
        </form>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
            <input type="hidden" name="favorite_action" value="0">
            <button type="submit">Șterge din favorite</button>
        </form>
    </div>


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
require_once('includes/footer.php');
?>

<style>
button {
    background-color: #4F75FF;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;

}

button.secondary {
    background-color: #4F75FF;

}
</style>