<!--
    Auteur: Mike Timmermans
    Aanmaakdatum: 14-05-2024

    Omschrijving: Index pagina
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Koppeling naar stylesheet -->
    <link rel="stylesheet" href="Styles/Stylesheet.css">
    <!-- Titel van de pagina -->
    <title>BTC</title>
</head>
<body>
<nav>
    <!-- Logo van BTC -->
    <img src="Images/logo.png" alt="BTC Logo">
    <ul>
        <!-- Navigatiemenu met verschillende pagina's -->
        <li><a href="/index.php">Home</a></li>
        <li><a href="">Vereniging</a></li>
        <li><a href="">Lidmaatschap</a></li>
        <li><a href="">Training</a></li>
        <li><a href="">Activiteiten</a></li>
        <li><a href="">Jeugd</a></li>
        <li><a href="Pages/testlogin.php">Login</a></li>
        <?php
        // Start sessie om te controleren of de gebruiker is ingelogd
        session_start();
        // Als de gebruiker is ingelogd, toon "Overzicht" en "Log Uit" links
        if (isset($_SESSION["userName"]))
        {
            echo '<li><a href="Pages/overview.php">Overzicht</a></li><li><a href="Pages/logOut.php">Log Uit</a></li>';
        }
        ?>
    </ul>
</nav>
<main>
    <div id="mainContainer">
        <div id="container1">
            <div>
                <h1>
                    Welkom!
                </h1>
            </div>
            <div>
                <!-- Welkomstbericht en beschrijving van de tennisclub -->
                BTC De Pettelaer is een bourgondische tennisclub in het hart van de sfeervolle stad 's-Hertogenbosch. Een tennisclub voor jong en oud, prestatieve en recreatieve spelers. Bij De Pettelaer gaan sportiviteit en gezelligheid hand in hand. In de prachtige atmosfeer van clubhuis 'De Knotwilg' wordt gelachen, gegeten en gedronken.<br><br>
                Tot snel op ons park!
            </div><br><br>
            <div class="line">
                <h3>
                    Nieuws
                </h3>
            </div>
            <div>
                <!-- Nieuwsbericht over een aankomend evenement -->
                <h1>
                    Avond Der Verdienstelijken op zaterdag 25 november
                </h1>
                <p>
                    Zondag 19 Mei
                </p>
                <span>
                Op zaterdag 25 Mei wordt weer de jaarlijkse ‘Avond der Verdienstelijken’ gehouden. Een diner bij de club voor de vrijwilligers,  georganiseerd door het bestuur, als dank voor alle werkzaamheden van het afgelopen jaar. Een club zoals de onze kan niet zonder de vrijwillige hulp van onze leden. In lijn met de club spirit past een gezellige avond als deze daar natuurlijk heel goed bij.<br>
            </span>
                <button>Lees meer</button>
            </div>
            <div>
                <!-- Nieuwsbericht over een vacature -->
                <h1>
                    Word jij onze nieuwe Ledenadministrateur?
                </h1>
                <p>
                    Donderdag 16 Mei
                </p>
                <span>
                Alle leden van BTC de Pettelaer hebben één gezamenlijke passie en dat is lekker tennissen. Een heleboel vrijwilligers zetten zich in om dit mogelijk te maken. Per direct zijn we op zoek naar een nieuwe Ledenadministrateur. Iets voor jou?<br>
            </span>
                <button>Lees meer</button>
            </div>
            <div id="foot">
                <?php
                // Inclusief de footer van de pagina
                include "Includes/Footer.php"
                ?>
            </div>
        </div>

        <div id="container2">
            <div class="line">
                <h3>
                    Baanstatus
                </h3>
            </div>
            <div class="line">
                <h3>
                    Online Reserveren
                </h3>
            </div>
            <div class="line">
                <h3>
                    Agenda
                </h3>
            </div>
            <div>
                <!-- Weergave van aankomende evenementen in de agenda -->
                <h4>
                    <a class="circle">22</a> Mei Husselavond <br>19:00
                </h4>
            </div>
            <div>
                <h4>
                    <a class="circle">25</a> Mei Avond der Verdienstelijken
                </h4>
            </div>
            <div>
                <h4>
                    <a class="circle">29</a> Mei ALV
                </h4>
            </div>
            <div>
                <h4>
                    <a class="circle">29</a> Mei Husselavond<br> 19:00
                </h4>
            </div>
            <div>
                <h4>
                    <a class="circle">06</a> Jun Husselavond<br> 19:00
                </h4>
            </div>
            <div>
                <h4>
                    <button>Toon volledige agenda</button>
                </h4>
            </div>
            <div class="line">
                <h3>
                    Toornooi.NL
                </h3>
            </div>
            <div>
                <h4>
                    <button> Meer van Toernooi.NL</button>
                </h4>
            </div>
        </div>
    </div>
</main>
</body>
</html>
