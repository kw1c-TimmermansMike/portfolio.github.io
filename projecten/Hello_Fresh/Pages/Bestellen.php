<!--
Auteur: Mike/Daan
    Aanmaakdatum: 29-03-2024

    Omschrijving: result
-->
<?php
// Start de sessie als er nog geen sessie actief is
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inclusie van de navigatiebalk
include "../Include/nav.php";

// Functie om het totaal aantal punten te berekenen tot aan de gegeven vraag
function calculateMaxPoints($question) {
    $max_points = 0;

    for ($i = 1; $i <= $question; $i++) {
        switch ($i) {
            case 1:
                $max_points += 10; // Aantal personen
                break;
            case 2:
                $max_points += 40; // Maaltijden per week
                break;
            case 3:
                $max_points += 30; // Tijd besteden aan bereiden
                break;
            case 4:
                $max_points += 20; // Favoriete soort keuken
                break;
            case 5:
                $max_points += 20; // Voorkeur groenten
                break;
            case 6:
                $max_points += 10; // Allergieën
                break;
            case 7:
                $max_points += 10; // Vlees in de box
                break;
            case 8:
                $max_points += 10; // Specifieke dieetwensen
                break;
            case 9:
                $max_points += 10; // Type gerechten
                break;
            case 10:
                $max_points += 10; // Speciale boxen voor feestdagen
                break;
            case 11:
                $max_points += 10; // Desserts in de box
                break;
            case 12:
                $max_points += 10; // Tijd van levering
                break;
            case 13:
                $max_points += 10; // Duurzaamheid van de box
                break;
            case 14:
                $max_points += 10; // Nieuwsbrief aanmelding
                break;
            case 15:
                $max_points += 10; // Bereidheid om feedback te geven
                break;
            default:
                break;
        }
    }

    return $max_points;
}

// Verwerk het formulier als het is ingediend
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Controleer of alle velden zijn ingevuld
    if (isset($_POST["aantal"]) && isset($_POST["vlees"]) && isset($_POST["allergisch"]) && isset($_POST["seizoenBox"]) && isset($_POST["voorbereiding"]) && isset($_POST["desserts"]) && isset($_POST["tijd"]) && isset($_POST["keukens"]) && isset($_POST["groente"]) && isset($_POST["tijdBox"]) && isset($_POST["box"]) && isset($_POST["nieuwsbrief"]) && isset($_POST["feedback"])) {
        // Bereken de score en specifieke voorkeuren
        $score = $_POST["aantal"] + $_POST["maaltijd"] + $_POST["tijd"] + $_POST["keukens"] + $_POST["groente"] + $_POST["tijdBox"] + $_POST["box"] + $_POST["nieuwsbrief"] + $_POST["feedback"];
        $specific = $_POST["vlees"] . $_POST["allergisch"] . $_POST["seizoenBox"] . $_POST["voorbereiding"] . $_POST["desserts"];

        // Sla de resultaten op in sessievariabelen
        $_SESSION["scores"] = $score;
        $_SESSION["specifics"] = $specific;

        // Stuur de gebruiker door naar de resultatenpagina
        header("Location: result.php");
        exit; // Stop de verdere uitvoering van het huidige script
    } else {
        // Geef een foutmelding als niet alle velden zijn ingevuld
        $error_message = "Gelieve alle velden in te vullen.";
    }
}
?>
<?php
$begroeting = "";
$uur = date("H");

if ($uur < 12) {
    $begroeting = "Goedemorgen";
} elseif ($uur < 18) {
    $begroeting = "Goedemiddag";
} else {
    $begroeting = "Goedenavond";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
    <!-- Koppeling met de stylesheet voor algemene stijl -->
    <link rel="stylesheet" href="../Styles/stylesheet.css">
    <!-- Koppeling met de stylesheet voor formulieren -->
    <link rel="stylesheet" href="../Styles/Style_Forms.css">
</head>
<body>
<div id="block">

    <h2>Stel je box samen</h2>
    <?php if(isset($error_message)): ?>
        <!-- Toon een foutmelding als deze bestaat -->
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <p>Dit zal je standaardvoorkeur worden, maar je hebt de vrijheid om wekelijks je box naar wens aan te passen.</p>

    <?php
    // Loop om het totaal aantal punten tot aan de huidige vraag te laten zien
    for ($question = 1; $question <= 15; $question++) {
        $max_points = calculateMaxPoints($question);
        $behaalde_punten = isset($_SESSION['scores']) ? $_SESSION['scores'] : 0;
        $verschil = $max_points - $behaalde_punten;

        echo "Na vraag $question kun je $max_points punten behalen.<br>";
        echo "Aantal behaalde punten: $behaalde_punten<br>";
        echo "Verschil: $verschil<br><br>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="enquête">
        <!-- Formulier voor het samenstellen van de box -->
        <!-- Hieronder volgen de vragen met de selectieopties -->

        <!-- Vraag 1: Aantal personen -->
        <div id="vraag1">
            <label for="aantal">Aantal personen:<br>
                <input name="aantal" type="radio" value="1" required> 1
                <input name="aantal" type="radio" value="2"> 2
                <input name="aantal" type="radio" value="3"> 3
                <input name="aantal" type="radio" value="4"> 4
                <input name="aantal" type="radio" value="5"> 5
                <input name="aantal" type="radio" value="6"> 6+<br><br>
            </label>
        </div>
        <!-- Vraag 2: Maaltijden per week -->
        <div id="vraag2">
            <label>Maaltijden per week wil u ontvangen?<br>
                <input name="maaltijd"type="radio" value="1"> 3
                <input name="maaltijd"type="radio" value="2"> 4
                <input name="maaltijd"type="radio" value="3"> 5
                <input name="maaltijd"type="radio" value="4"> 6<br><br>
            </label>
        </div>
        <!-- Vraag 3: Hoe lang wilt u besteden aan het bereiden van een maaltijd? -->
        <div id="vraag3">
            <label>Hoe lang wilt u besteden aan het bereiden van een maaltijd?<br>
                <input name="tijd" type="radio" value="1"> Minder dan 30 minuten
                <input name="tijd" type="radio" value="2"> 30-45 minuten
                <input name="tijd" type="radio" value="3"> 60 minuten
                <input name="tijd" type="radio" value="4"> 60 minuten of meer<br><br>
            </label>
        </div>
        <div id="vraag4">
            <label>Wat is uw favoriete soort keuken?<br>
                <input name="keukens" type="checkbox" value="1">Italiaanse
                <input name="keukens" type="checkbox" value="2"> Aziatisch
                <input name="keukens" type="checkbox" value="3" > Mediterraan
                <input name="keukens" type="checkbox" value="4"> Amerikaanse<br><br>
            </label>
        </div>
        <div id="vraag5">
            <label>Welke groenten heeft uw voorkeur voor maaltijden?<br>
                <input name="groente" type="checkbox" value="1">Bladgroenten (zoals spinazie, sla)
                <input name="groente" type="checkbox" value="2"> Wortelgroenten (zoals wortels, zoete aardappelen)
                <input name="groente" type="checkbox" value="3">Peulvruchten (zoals bonen, linzen)
                <input name="groente" type="checkbox" value="4"> Knolgewassen (zoals aardappelen)<br><br>
            </label>
        </div>
        <div id="vraag6">
            <label>Waar ben je allergisch voor?<br>
                <input name="allergisch" type="radio" value="melk"> Melk producten
                <input name="allergisch" type="radio" value="noten"> Noten
                <input name="allergisch" type="radio" value="gluten"> Gluten
                <input name="allergisch" type="radio" value="geen"> Geen allergiën<br><br>
            </label>
        </div>
        <div id="vraag7">
            <label>wil u vlees in doos?<br>
                <input name="vlees" type="checkbox" value="vlees"> Ja
                <input name="vlees" type="checkbox" value="vegaVlees"> Vegatarische vlees
                <input name="vlees" type="checkbox" value="halalVlees"> Halal vlees
                <input name="vlees" type="checkbox" value="VisVlees"> Visgerechten
                <input name="vlees" type="checkbox" value="geenVlees"> Nee<br><br>
            </label>
        </div>
        <div id="vraag8">
            <label>Heeft u specifieke dieetwensen?<br>
                <input name="dieetwensen" type="radio" value="vega"> Vegetarisch
                <input name="dieetwensen" type="radio" value="vegan"> Veganistisch
                <input name="dieetwensen" type="radio" value="glutenvrij"> glutenvrij
                <input name="dieetwensen" type="radio" value="geenWensen"> geen specifieke dieetwensen<br><br>
            </label>
        </div>
        <div id="vraag9">
            <label>Welk type gerechten spreekt u het meeste aan?<br>
                <input name="voorbereiding" type="radio" value="kort">Snelle en eenvoudige gerechten.
                <input name="voorbereiding" type="radio" value="middel">Gerechten die net wat langer duren om te maken.
                <input name="voorbereiding" type="radio" value="lang">Uitgebreide gerechten die ruim een uur kunnen kosten.<br>
                <input name="voorbereiding" type="radio" value="uitgebreid">Enorm uitgebreide gerechten die meerdere uren kunnen kosten<br><br>
            </label>
        </div>
        <div id="vraag10">
            <label>Zou u geïnteresseerd zijn in speciale HelloFresh-boxen voor feestdagen of speciake gelegenheden?<br>
                <input name="seizoenBox" type="radio" value="seizoen"> Seizoenbox
                <input name="seizoenBox" type="radio" value="feest"> Feestdagen box
                <input name="seizoenBox" type="radio" value="thema"> Thematische boxen
                <input name="seizoenBox" type="radio" value="geenFeest"> Nee, ik hoef geen specaile box<br><br>
            </label>
        </div>
        <div id="vraag11">
            <label>Wilt u de mogelijkheid hebben om desserts in uw box te ontvangen 1 keer per maand?<br>
                <input name="desserts" type="radio" value="taart"> Taarten en Gebak
                <input name="desserts" type="radio" value="pudding"> Puddingen en Mousses
                <input name="desserts" type="radio" value="fruit"> Fruitige Desserts
                <input name="desserts" type="radio" value="ijs"> IJs en Sorbets<br><br>
            </label>
        </div>
        <div id="vraag12">
            <label>Rond welke tijd wilt u de box ontvangen<br>
                <input name="tijdBox" type="radio" value="1"> tussen 8:00 uur en 10:00 uur
                <input name="tijdBox" type="radio" value="2">tussen 12:00 uur en 16:00 uur
                <input name="tijdBox" type="radio" value="2">tussen 16:00 uur en 18:00 uur
                <input name="tijdBox" type="radio" value="3"> tussen 18:00 uur en 21:00 uur<br><br>
            </label>
        </div>
        <div id="vraag13">
            <label>Hecht u belang aan duurzaamheid en milieuvriendelijke verpakkingen?<br>
                <input name="box" type="radio" value="1">Zeer belangrijk
                <input name="box" type="radio" value="2">Redelijk belangrijk
                <input name="box" type="radio" value="3"> Niet erg belangrijk
                <input name="box" type="radio" value="4"> Niet belangrijk<br><br>
            </label>
        </div>
        <div id="vraag14">
            <label>Wilt u zich aanmelden voor onze nieuwsbrief die 1 keer per maand met de box geleverd wordt?<br>
                <input name="nieuwsbrief" type="radio" value="1"> Ja, ik ontvang graag nieuws en recepten
                <input name="nieuwsbrief" type="radio" value="2"> Alleen als het exclusieve aanbiedingen
                <input name="nieuwsbrief" type="radio" value="3"> Nee, dat wil ik niet
                <input name="nieuwsbrief" type="radio" value="4"> Ik heb al aangemeld<br><br>
            </label>
            <div id="vraag15">
                <label>Bent u bereid om regelmatig feedback te geven over de ontvangen maaltijden om onze service te helpen verbeteren?<br>
                    <input name="feedback" type="radio" value="4"> Ja, ik ben bereid om regelmatig feedback
                    <input name="feedback" type="radio" value="2">Niet vaak, alleen als ik ontevreden ben
                    <input name="feedback" type="radio" value="3"> af en toe, als ik iets specifieks opmerk
                    <input name="feedback" type="radio" value="1"> Nee, ik geef liever geen feedback<br><br>
                </label>
        <!-- Verzendknop voor het versturen van het formulier -->
        <button type="submit">Verzend</button>
    </form>
    <!-- Inclusie van de footer -->
    <?php include "../Include/footer.php"; ?>
</div>
</body>
</html>
