<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $to = "contact@cnassim.com";

    // En-têtes du mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Corps du mail au format HTML avec un peu de style
    $mail_body = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #333;
            }
            p {
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Nouveau message de $name</h2>
            <p><strong>Nom:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Sujet:</strong> $subject</p>
            <p><strong>Message:</strong><br> $message</p>
        </div>
    </body>
    </html>
    ";

    // Envoi du mail
    $success = mail($to, $subject, $mail_body, $headers);

    if ($success) {
        echo "Votre message a été envoyé. Merci !";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
} else {
    echo "Une erreur s'est produite. Veuillez réessayer.";
}
?>
