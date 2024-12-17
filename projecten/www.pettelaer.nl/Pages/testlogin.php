<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: Login pagina
-->
<link rel="stylesheet" href="../Styles/IncludesStyle.css">
<?php
// Inclusief het navigatiemenu
include "../Includes/Nav.php";
?>

<!-- Inlogformulier -->
<form id="stupid" action="overview.php" method="post">
    <label for="userName">GEBRUIKERSNAAM:</label>
    <input type="text" name="userName"><br>
    <label for="password">WACHTWOORD:</label>
    <input type="text" name="password"><br>
    <input type="submit" name="login" value="login">
</form>

<?php
// Inclusief de footer
include "../Includes/Footer.php";
?>



