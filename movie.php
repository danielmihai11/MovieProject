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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favorite_action'])) {
    if (isset($_POST['movie_id'])) {
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
        } elseif ($favorite_action == 0) {
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
            $runtime = $movie['runtime']; // Define runtime here to avoid undefined variable error
            break;
        }
    }
}

// Procesare formular review
$form_submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $agree = isset($_POST['agree']);

    if (!empty($name) && !empty($email) && !empty($message) && $agree) {
        $form_submitted = true;
    }
}
?>

<div class="container">
    <?php if ($movie): ?>
    <h1><?php echo $movie['title']; ?></h1>
    <div>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
            <input type="hidden" name="favorite_action" value="1">
            <button type="submit"> Adaugă la favorite
                <span class="badge bg-secondary"><?php echo $favorite_count ?? 0; ?></span>
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

    <div class="row">
        <div class="col-12">
            <h2>Adaugă un review</h2>

            <?php if ($form_submitted): ?>
            <div class="alert alert-success" role="alert">
                Review-ul tău a fost trimis cu succes!
            </div>
            <?php else: ?>
            <form method="POST">
                <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Nume</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Mesajul review-ului</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                    <label class="form-check-label" for="agree">Sunt de acord cu procesarea datelor cu caracter
                        personal</label>
                </div>

                <button type="submit" name="submit_review" class="btn btn-primary">Trimite review-ul</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-danger" role="alert">
        Movie not found!
    </div>
    <?php endif; ?>
</div>

<?php require_once('includes/footer.php'); ?>