<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Execution;

require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {

    /* Set the mail sender. */
    $mail->setFrom('hackers@poulette.com', 'Hackers Poulette');

    /* Add a recipient. */
    $mail->addAddress('marahandrioli@gmail.com', 'Marah');

    /* Set the subject. */
    $mail->Subject = "Thank you for contacting us!";

    /* Enable HTML */
    $mail->isHTML(TRUE);

    /* $mail->AddEmbeddedImage("assets/images/logo.png", "logo", "assets/images/logo.png"); */

    /* Set the mail message body. */
    $mail->Body =
        "Bonjour";

    /* SMTP parameters. */
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'zartovmaroteov@gmail.com';
    $mail->Password = 'under087';

    /* Finally send the mail. */
    $mail->send();
} catch (Exception $e) {
    /* PHPMailer exception. */
    echo $e->errorMessage();
} catch (\Exception $e) {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
}

$errors = [];

if(!array_key_exists('gender', $_POST) || $_POST['gender'] == '') {
    $errors['gender'] = "you didn't fill in your gender.";
}

if(!array_key_exists('firstname', $_POST) || $_POST['firstname'] == '') {
    $errors['firstname'] = "you didn't fill in your firstname.";
}

if(!array_key_exists('email', $_POST) || $_POST['email'] == '') {
    $errors['email'] = "you didn't fill in your email.";
}

if(!empty($errors)) {
    session_start();
    $_SESSION['errors'] = $errors;
    header('Location: contact.php');
    

}

var_dump($errors);
die();

$message = $_POST['message'];
$header = 'FROM: untel';
mail('marahandrioli@gmail.com', 'Contact form', $message, $header);



?>