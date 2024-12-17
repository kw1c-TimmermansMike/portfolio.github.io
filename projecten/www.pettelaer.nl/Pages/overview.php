<!--
    Auteur: Hidde Kuiper
    Aanmaakdatum: 11/01/2024 10:06

    Omschrijving: index page
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <!-- Tekenset declareren -->
    <meta charset=utf-8>
    <!-- Viewport declareren -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- koppeling stylesheet -->
    <link rel="stylesheet" href="Styles/stylesheet.css">
    <!-- stylesheet voor de index -->
    <link rel="stylesheet" href="Styles/index.css">
    <!-- stylesheet voor de footer-->
    <link rel="stylesheet" href="Styles/footer.css">
    <!-- koppeling javascript -->
    <script src="Scripts/Script.js" defer></script>
    <!-- copied from w3 schools for hamburger menu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- title -->
    <title>BTC</title>
</head>

<header>
    <!-- navigatiebalk -->
    <nav>
        <section>
            <!-- nav bar -->
            <div class="topnav" id="Navtop">
                <a href="" class="active">Home</a>
                <a href="Pages/login.php" class="active">login</a>
                <?php
                session_start();
                if (isset($_SESSION["userName"]))
                {
                    echo'<a href="Pages/overview.php" class="active">Activiteiten</a><a href="Pages/logOut.php" class="active">Log Uit</a>';
                }
                ?>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <!-- hamburger menu class -->
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </section>
    </nav>
</header>
<body>
<main>
    <img src="Images/placeholder.jpg" id="bannerImage">
    <h1> Welkom</h1>
    <p>
        Stel je voor dat je voor elke inhoudelijke aanpassing een webbeheerder moet contacteren. Nah, dat hoef je je niet voor te stellen, want wij leveren jouw website met een fantastisch CMS (content management system). Het heeft ons 2 jaar tijd gekost om het zodanig vorm te geven, dat zelfs de digibeten van de 21e eeuw zelfstandig hun website kunnen beheren. Wij zijn vooral trots op ons systeem, omdat we kunnen bewijzen dat het sneller, eenvoudiger en veiliger is dan wordpress.<br>
        Er vindt momenteel een grote verschuiving plaats van dataverkeer van desktop PC's naar mobiele apparaten zoals smartphones en tablets. We weten de exacte getallen niet, maar je kan er van uit gaan dat de kans groter is dat jouw website via een smartphone bezocht wordt dan via een PC. Het is daarom belangrijk dat je website correct weergegeven wordt op apparaten van verschillende beeldformaten. Al onze websites zijn standaard voorzien van een responsive layout dat zich automatisch aanpast aan het apparaat waarop het weergegeven wordt.
    </p>
    <div id="tableContainer">
        <?php
        include "Includes/db_functions.php";
        startConnection("SportAcademie");
        $query = "SELECT * FROM Activity";

        $lenght = "SELECT COUNT(ActivityID) AS [count] FROM Activity";
        $realLenght = executeQuery($lenght);
        //   haalt waarde op
        $realLenght = $realLenght->fetch(PDO::FETCH_ASSOC);
        //         geeft waarde als string
        $realLenght = $realLenght['count'];

        $result = executeQuery($query);
        //   it runs everytime i is smaller than array lenght and every run it increases i by 1

        for ($i = 0; $i < $realLenght; $i++)
        {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $ActivityID = $row["ActivityID"];
            echo "<div><h1>Activiteit ".$row["ActivityID"]."</h1>";
            echo "<div>" . $row["Name"] . "</div>";
            echo "<div>" . $row["Start"] . "</div>";
            echo "<div>" . $row["End"] . "</div>";
            echo "<div>" . $row["Location"] . "</div>";
        }
        ?>
    </div>
</main>
<?php include "Includes/Footer.php"?>
</body>
</html>