<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daniel Burtila</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    $current_page = basename($_SERVER["PHP_SELF"]); //pentru a memora pagina curenta
        $menu_items = array(
            array(
                "name"=>"Home", 
                "link"=>"index.php"),
            array(
                "name"=> "Contact",
                "link"=> "contact.php"),
            array(
                "name"=> "Movies",
                "link"=> "#","dropdown"=> array(
                    array(
                        "name"=> "Titanic",
                        "link"=> "movie-1.php"),
                    array(
                        "name"=>"Uncharted",
                        "link"=> "movie-2.php"),
                    array(
                        "name"=>"Emily in Paris",
                        "link"=> "movie-3.php"),
                )),
            array(
                'name' => "Genres",
                'link' => "genres.php"
            ),
    
            array(
                "name"=>"Disabled",
                "link"=> "#", 
                "disabled"=> true
            )
        );

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($menu_items) && is_array($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                    <?php if (isset($item['dropdown'])): ?>
                    <!-- Afișează un element dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo in_array($current_page, array_column($item['dropdown'], 'link')) ? 'active' : ''; ?>"
                            href="<?php echo $item['link']; ?>" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $item['name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($item['dropdown'] as $dropdown_item): ?>
                            <li><a class="dropdown-item <?php echo $current_page === $dropdown_item['link'] ? 'active' : ''; ?>"
                                    href="<?php echo $dropdown_item['link']; ?>"><?php echo $dropdown_item['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php elseif (isset($item['disabled']) && $item['disabled']): ?>
                    <!-- Afișează un element dezactivat -->
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1"
                            aria-disabled="true"><?php echo $item['name']; ?></a>
                    </li>
                    <?php else: ?>
                    <!-- Afișează un element simplu -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === $item['link'] ? 'active' : ''; ?>"
                            href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <?php include("includes/search-form.php"); ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php 
        if($current_page!="index.php" && $current_page!= "contact.php"){

            $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];


        }
       
        ?>
        <?php include("includes/functions.php"); ?>
    </div>
</body>

</html>