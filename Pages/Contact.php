<!doctype html>
<!-- >
    Auteur:         <Mike Timmermans>
    Aanmaakdatum:   < 26-08-2024
    <omschrijving inhoud>
-->
<html lang="nl">
<head>
	<title>
		Portfolio Mike Timmermans
	</title>
	<!-- declaratie tekenset -->
	<meta charset="UTF-8">
	<!-- declaratie viewport -->
	<meta name="viewport" content="width=device-width, initial-scale= 1.0">
	<!-- linkjes CSS & JAVA -->
	<link rel="stylesheet" href="../Styles/Stylesheet.css">
	<script src="../Scripts/script.js" defer></script>
</head>
<?php include '../includes/header.php'; ?>
<div class="contact-form">
    <h1>\\-CONTACT-//</h1>
    <p><span>\\-</span>NEEM VIA HIER <span class="highlight">CONTACT</span> MET MIJN OP<span>-//</span></p>
    <form action="https://formspree.io/f/mjkvoodg" method="POST">
        <label for="name">NAAM</label>
        <input placeholder="Naam" class="input" name="name" type="text" required>

        <label for="email">E-MAIL:</label>
        <input placeholder="Mail" class="input" name="email" type="email" required>
        
        <label for="message">BERICHT:</label>
        <textarea placeholder="Schrijf je bericht hier..." class="input" name="message" required></textarea>

        <button class="cta" type="submit">
            <span>VERSTUUR &nbsp;</span>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </button>
    </form>
</div>
</html>