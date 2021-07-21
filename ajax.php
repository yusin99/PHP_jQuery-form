<?php
require "sendemail.php";
$nom = htmlspecialchars($_POST["nom"]);
$numero = htmlspecialchars($_POST["numero"]);
$email = htmlspecialchars($_POST["email"]);
$sujet = htmlspecialchars($_POST["sujet"]);
$message = htmlspecialchars($_POST["message"]);

/* vérifications */

if (!isset($_POST['prenom']) || empty($_POST['prenom'])) {
    die("Votre prénom est obligatoire");
}
if (!isset($_POST['nom']) || empty($_POST['nom'])) {
    die("Votre nom est obligatoire");
}
if (!isset($_POST['email']) || empty($_POST['email'])) {
    die("Votre email est obligatoire");
}
if (!isset($_POST['sujet']) || empty($_POST['sujet'])) {
    die("Le sujet est obligatoire");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Le format de votre email est invalide");
}
if (!isset($_POST['numero']) || empty($_POST['numero'])) {
    die("Votre number est obligatoire");
}
if (!is_numeric($_POST['numero'])) {
    die("Votre number doit contenir que des chiffres");
}
if (!isset($_POST['message']) || empty($_POST['message'])) {
    die("Votre message est obligatoire");
}

$res = send_mail($email, $sujet, $message);
if ($res) {
    echo "Envoyé avec succès";
} else {
    echo "Une erreur est survenue";
}