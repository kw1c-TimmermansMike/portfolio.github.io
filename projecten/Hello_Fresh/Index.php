<!--
Auteur: Mike/Daan
    Aanmaakdatum: 29-03-2024

    Omschrijving: index
-->
<?php
// PHP-code om het tijdstip van de dag te bepalen
$tijd = date("H"); // Haal alleen het uur op van de huidige tijd

// Begroeting op basis van het tijdstip van de dag
if ($tijd < 12) {
    $groet = "Goedemorgen"; // Als het voor 12 uur is, is het ochtend
} elseif ($tijd < 18) {
    $groet = "Goedemiddag"; // Als het tussen 12 en 18 uur is, is het middag
} else {
    $groet = "Goedeavond"; // Anders is het avond
}

echo $groet;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Koppeling met het stylesheet -->
    <link rel="stylesheet" href="Styles/stylesheet.css">
    <!-- Titel van de pagina -->
    <title>HelloFresh</title>
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <img src="Images/logo.jpg" alt="HelloFresh Logo">
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Pages/Bestellen.php">Formulier</a></li>
            <li><a href="Pages/login.php">Login</a></li>
            <?php
            // Controleer of de cookies "scores" en "specifics" zijn ingesteld en bepaalde waarden bevatten
            if (isset($_COOKIE["scores"]) && isset($_COOKIE["specifics"])) {
                // Als beide cookies zijn ingesteld, toon een link naar de pagina "Resultaten"
                echo "<li><a href='Pages/result.php'>Resultaten</a></li>";
            } else {
                // Als een van beide cookies niet is ingesteld, toon een link naar de pagina "Bestellen"
                echo "<li><a href='Pages/Bestellen.php'>Resultaten</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<!-- Sectie voor het stukje tekst met de knop -->
<section class="knop">
    <h1><?php echo $groet; ?></h1> <!-- Toon de begroeting op basis van het tijdstip van de dag -->
    <p>Kies elke week uit meer dan 45 recepten vanaf slechts € 4,30 per portie</p>
    <!-- De knop om te starten -->
    <a href="Pages/Bestellen.php" class="knoplook">Get Started</a>
</section>

<!-- Sectie voor de afbeeldingen van de featured recepten -->
<section class="recept">
    <h1>Featured</h1>
    <div class="images">
        <img src="Images/recept1.jpg" alt="Recipe 1">
        <h3>Recept 1</h3>
        <br>
        <img src="Images/recept2.jpg" alt="Recipe 2">
        <h3>Recept 2</h3>
        <br>
        <img src="Images/recept3.jpg" alt="Recipe 3">
        <h3>Recept 3</h3>
    </div>
</section>

<!-- Footer met copyright logo -->
<?php
include "Include/footer.php"; // Inclusie van de footer
?>
</body>
</html>
