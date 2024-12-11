<?php
function runtime_prettier($minutes) {
    // Calculăm orele și minutele
    $hours = floor($minutes / 60);
    $remaining_minutes = $minutes % 60;

    // Returnăm rezultatul direct, cu formatare simplă
    return ($hours > 0 ? $hours . " hour" . ($hours > 1 ? "s" : "") . " " : "")
           . ($remaining_minutes > 0 ? $remaining_minutes . " minute" . ($remaining_minutes > 1 ? "s" : "") : "");
}

function check_old_movie($release_year)
{
    $current_year = date("Y"); //obtinem anul curent
    $movie_age = $current_year - $release_year; //calculam varsta filmului

    if($movie_age>40){
        return $movie_age;

    }else
      return false; //returnam false daca are 40 de ani sau mai putin

}

function connect_to_database() {
    $host = "localhost";
    $username = "php-user"; // Utilizatorul implicit al Local by Flywheel
    $password = "php-password"; // Parola este, de obicei, goală
    $dbname = "php-proiect";

    // Creează conexiunea
    $conn = new mysqli($host, $username, $password, $dbname);

    // Verifică conexiunea
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    return $conn;
}