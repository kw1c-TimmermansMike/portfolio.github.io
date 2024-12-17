<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: PHP om uit te loggen en de sessie te beëindigen
-->
<?php
// Start de sessie
session_start();
// Verwijder alle sessievariabelen
session_unset();
// Vernietig de sessie
session_destroy();
// Stuur de gebruiker door naar de startpagina
header("Location: ../index.php");
?>
