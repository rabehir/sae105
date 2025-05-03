<?php
// Vérifie si la méthode HTTP est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validation des champs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Configuration de l'email
        $to = "votre-email@example.com"; // Remplacez par l'adresse email où vous voulez recevoir les messages
        $subject = "Nouveau message de contact de $name";
        $email_message = "Vous avez reçu un nouveau message via le formulaire de contact.\n\n";
        $email_message .= "Nom : $name\n";
        $email_message .= "Email : $email\n\n";
        $email_message .= "Message :\n$message\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Envoi de l'email
        if (mail($to, $subject, $email_message, $headers)) {
            // Redirection après succès
            header("Location: merci.html"); // Remplacez par une page de remerciement
            exit;
        } else {
            echo "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer plus tard.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    // Redirection si le fichier est accédé sans soumission du formulaire
    header("Location: contact.php");
    exit;
}
?>
