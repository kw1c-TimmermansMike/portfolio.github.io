<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: nav include
-->
<!-- Koppeling naar de stylesheet voor de navigatie -->
<link rel="stylesheet" href="../Styles/IncludesStyle.css">
<header>
    <!-- Navigatiebalk -->
    <nav>
        <!-- Logo afbeelding -->
        <img src="../Images/logo.png" alt="BTC Logo">
        <!-- Navigatielijst -->
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="">Vereniging</a></li>
            <li><a href="">Lidmaatschap</a></li>
            <li><a href="">Training</a></li>
            <li><a href="">Activiteiten</a></li>
            <li><a href="">Jeugd</a></li>
            <li><a href="../Pages/testlogin.php">Login</a></li>
            <?php
            // Start een sessie
            session_start();
            // Controleer of de gebruiker is ingelogd
            if (isset($_SESSION["userName"]))
            {
                // Voeg extra menu-items toe voor ingelogde gebruikers
                echo '<li><a href="overview.php">Overzicht</a></li><li><a href="logOut.php">Log Uit</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
