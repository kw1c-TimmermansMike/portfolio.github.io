<!--
Auteur: Mike/Daan
    Aanmaakdatum: 29-03-2024

    Omschrijving: navigatie
-->
<?php// Start de sessie als er nog geen sessie actief is
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
?>
<header>
    <!-- navigatiebalk -->
    <nav>
        <!-- div voor het logo plus de invoer van het logo -->
        <div class="logo">
            <img src="../Images/logo.jpg" alt="HelloFresh Logo">
        </div>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../Pages/Bestellen.php">formulier</a></li>
            <li><a href="#">login</a></li>
        </ul>
    </nav>
</header>