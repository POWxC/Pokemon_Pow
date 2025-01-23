<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vérification des champs
    if (!empty($nom) && !empty($email) && !empty($message)) {
        // Adresse e-mail du destinataire
        $destinataire = "pauline.charlesx@gmail.com";

        // Sujet de l'e-mail
        $sujet = "Nouveau message de $nom";

        // Corps de l'e-mail
        $corps = "Vous avez reçu un nouveau message :\n\n";
        $corps .= "Nom : $nom\n";
        $corps .= "E-mail : $email\n\n";
        $corps .= "Message :\n$message\n";

        // En-têtes pour l'e-mail
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoi de l'e-mail
        if (mail($destinataire, $sujet, $corps, $headers)) {
            echo "Votre message a été envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de votre message.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>