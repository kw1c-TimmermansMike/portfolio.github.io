<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: Login pagina
-->
<?php
// Functie om de inloggegevens te controleren
function checkLogin($inputUsername, $inputPassword)
{
    // Arrays met geldige gebruikersnamen en wachtwoorden
    $wachtwoord = array("T3nn1sIsH1p", "1234", "54321", "secret", "wachtwoord", "test");
    $gebruikersnaam = array("pettelear", "Bramer", "Butter", "Haalboom", "Poelsma", "test");

    // Controleer of de ingevoerde gebruikersnaam en wachtwoord overeenkomen met de waarden in de arrays
    if ($inputUsername == $gebruikersnaam[0] && $inputPassword == $wachtwoord[0])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    elseif ($inputUsername == $gebruikersnaam[1] && $inputPassword == $wachtwoord[1])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    elseif ($inputUsername == $gebruikersnaam[2] && $inputPassword == $wachtwoord[2])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    elseif ($inputUsername == $gebruikersnaam[3] && $inputPassword == $wachtwoord[3])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    elseif ($inputUsername == $gebruikersnaam[4] && $inputPassword == $wachtwoord[4])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    elseif ($inputUsername == $gebruikersnaam[5] && $inputPassword == $wachtwoord[5])
    {
        // Als de gegevens kloppen, zet de sessie variabelen en stuur door naar de overzichtspagina
        $_SESSION["loggedIn"] = true;
        $_SESSION["userName"] = $inputUsername;
        header("Location: overview.php");
    }
    else
    {
        // Als de inloggegevens niet overeenkomen, wordt de gebruiker teruggestuurd naar de inlogpagina
        header("Location: testlogin.php");
    }
}
?>

