<?php

$sql = "SELECT id_quiz, titre_quiz, photo_quiz, date_quiz FROM quiz";
$result = $conn->query($sql);

    // Affichage des résultats de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_quiz"]. " - Titre: " . $row["titre_quiz"]. " - Photo: " . $row["photo_quiz"]. " - Date: " . $row["date_quiz"]. "<br>";
    }


?>