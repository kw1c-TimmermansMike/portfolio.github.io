<!--Dit is de email function die ervoor zorgt dat ik een mailtje krijg-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Haal de formuliergegevens op
	$name = htmlspecialchars(trim($_POST['name']));
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
	$message = htmlspecialchars(trim($_POST['message']));

	// Controleer of alle velden zijn ingevuld.
	if (!empty($name) && !empty($email) && !empty($message)) {

		// Stel e-mailgegevens in en waar die afgeleverd moet worden.
		$to = "lange.timmermans@edu-kw1c.nl";
		$subject = "Nieuw contactformulier bericht van $name";
		$body = "Naam: $name\nE-mail: $email\n\nBericht:\n$message";
		$headers = "From: $email";

		// Verzend de e-mail en geeft foutcodes als er iets fout gaat.
		if (mail($to, $subject, $body, $headers)) {
			echo "Bedankt voor je bericht!. Uw bericht wordt nu verzonden naar Mike Timmermans";
		} else {
			echo "Er is iets misgegaan bij het verzenden van je bericht. Probeer het opnieuw.";
		}
	} else {
		echo "Alle velden zijn verplicht. Vul elke veld in.";
	}
} else {
	echo "Ongeldige aanvraag. Probeer het opnieuw.";
}