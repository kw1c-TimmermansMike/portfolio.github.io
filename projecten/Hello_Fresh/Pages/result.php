<!--
Auteur: Mike/Daan
    Aanmaakdatum: 29-03-2024

    Omschrijving: result
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
    <!-- Koppeling met de stylesheet voor de algemene stijl -->
    <link rel="stylesheet" href="../Styles/stylesheet.css">
    <!-- Koppeling met de stylesheet voor formulieren -->
    <link rel="stylesheet" href="../Styles/Style_Forms.css">
</head>
<body>
<section>
    <?php
    // Start de sessie als er nog geen sessie actief is
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Inclusie van de navigatiebalk
    include "../Include/nav.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Controleer of alle velden zijn ingevuld
        if (isset($_POST["aantal"]) && isset($_POST["vlees"]) && isset($_POST["allergisch"]) && isset($_POST["seizoenBox"]) && isset($_POST["voorbereiding"]) && isset($_POST["desserts"])) {
            // Bereken de score en specifieke voorkeuren
            $expire = time() + 3600 + 450 * 100; // Vervaltijd voor de cookies
            $score = $_POST["aantal"] + $_POST["maaltijd"] + $_POST["tijd"] + $_POST["keukens"] + $_POST["groente"] + $_POST["tijdBox"] + $_POST["box"] + $_POST["nieuwsbrief"] + $_POST["feedback"];
            $specific = $_POST["vlees"] . $_POST["allergisch"] . $_POST["seizoenBox"] . $_POST["voorbereiding"] . $_POST["desserts"];

            // Sla de scores en specifieke voorkeuren op in cookies
            setcookie("scores", $score, $expire, "/");
            setcookie("specifics", $specific, $expire, "/");
        } else {
            // Geef een foutmelding als niet alle velden zijn ingevuld
            $error_message = "Gelieve alle velden in te vullen.";
        }
    }

    // Controleer of de sessievariabelen zijn ingesteld
    if (isset($_SESSION["scores"]) && isset($_SESSION["specifics"])) {
        // Haal de scores en specifieke voorkeuren op uit de sessie
        $score = $_SESSION["scores"];
        $specific = $_SESSION["specifics"];

        // Toon de naam van de potentiële klant
        echo "<h2>Beste Klant,</h2>";

        // Toon de huidige datum en tijd
        echo "<p>Huidige datum en tijd: " . date("d-m-Y H:i:s") . "</p>";

        // Toon het advies op basis van de score
        echo "<p>";
        if ($score <= 9) {
            echo "Advies 1 - <a href=\"https://www.hellofresh.nl/menus\" target=\"_blank\">HelloFresh</a>";
        } elseif ($score > 9 && $score <= 18) {
            echo "Advies 2 - <a href=\"https://www.hellofresh.nl/menus\" target=\"_blank\">HelloFresh</a>";
        } elseif ($score > 18 && $score <= 27) {
            echo "Advies 3 - <a href=\"https://www.hellofresh.nl/menus\" target=\"_blank\">HelloFresh</a>";
        } elseif ($score > 27 && $score <= 36) {
            echo "Advies 4 - <a href=\"https://www.hellofresh.nl/menus\" target=\"_blank\">HelloFresh</a>";
        }
        echo "</p>";
        ?>
        <!-- Link naar menu's voor meer inspiratie -->
        <p>Bekijk ook onze <a href="https://www.hellofresh.nl/menus" target="_blank">menu's</a> voor meer inspiratie.</p>
        <?php
        // Toon een overzicht van de ingevulde antwoorden
        echo "<h3>Overzicht van ingevulde antwoorden:</h3>";
        echo "<p>Specifieke voorkeuren: " . $specific . "</p>";

    } else {
        // Als de sessievariabelen niet zijn ingesteld, toon dan een foutmelding of een melding dat er geen resultaten beschikbaar zijn
        if (!isset($error_message)) {
            echo "Er zijn geen resultaten beschikbaar.";
        } else {
            echo $error_message;
        }
    }
    ?>
</section>
<?php
// Inclusie van de footer
include "../Include/footer.php";
?>
</body>
</html>

