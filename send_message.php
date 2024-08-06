<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $full_message = "Nom: $first_name $last_name\nEmail: $email\nMessage: $message";

    // Envoi du message via une API SMS
    $api_key = "VOTRE_API_KEY";
    $to = "+241077101378";
    $sms_message = urlencode($full_message);

    $url = "https://api.smsprovider.com/send?api_key=$api_key&to=$to&message=$sms_message";

    $response = file_get_contents($url);

    if ($response) {
        echo "Message envoyé avec succès!";
    } else {
        echo "Échec de l'envoi du message.";
    }
}
?>
