<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: footer include
-->
<footer>
    <?php
    // Controleer of de gebruiker is ingelogd
    if (isset($_SESSION["loggedIn"]))
    {
        // Toon een bericht dat de gebruiker is ingelogd, inclusief de gebruikersnaam
        echo "U bent ingelogd meneer " . $_SESSION["userName"];
    }
    ?>
</footer>

