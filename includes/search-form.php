<form class="d-flex" method="GET" action="search-results.php">
    <?php
    // Verifică dacă există parametrul 'search' sau 's' în URL
    $search_query = isset($_GET['s']) ? htmlspecialchars($_GET['s']) : (isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '');
    ?>
    <input class="form-control me-2" type="search" name="s" placeholder="Search" aria-label="Search"
        value="<?php echo $search_query; ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>