<?php
require "./sendemail.php";
$ret = array();
$ret['status'] = 'ok';
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$numero = htmlspecialchars($_POST["numero"]);
$email = htmlspecialchars($_POST["email"]);
$sujet = htmlspecialchars($_POST["sujet"]);
$message = htmlspecialchars($_POST["message"]);
if (!isset($prenom) || empty($prenom)) {
    $ret['error']['prenom'] = "Votre prénom est obligatoire";
    $ret['status'] = 'error';
}
if (!isset($nom) || empty($nom)) {
    $ret['error']['nom'] = "Votre nom est obligatoire";
    $ret['status'] = 'error';
}
if (!isset($email) || empty($email)) {
    $ret['error']['email'] = "Votre email est obligatoire";
    $ret['status'] = 'error';
}
if (!isset($sujet) || empty($sujet)) {
    $ret['error']['sujet'] = "Le sujet est obligatoire";
    $ret['status'] = 'error';
}
if (!isset($numero) || empty($numero)) {
    $ret['error']['numero'] = "Le numero est obligatoire";
    $ret['status'] = 'error';
}
if (!isset($message) || empty($message)) {
    $ret['error']['message'] = "Le message est obligatoire";
    $ret['status'] = 'error';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $ret['error']['email'] = "Mauvais format pour le email";
    $ret['status'] = 'error';
}
if (!is_numeric($numero)) {
    $ret['error']['numero'] = "Mauvais format pour le numero";
    $ret['status'] = 'error';
}
if ($ret['status'] == 'ok') {
    send_mail($email, $sujet, $message);
    $ret['msg'] = "<span style='color:green'>Envoyé avec succès</span>";
} else {
    $ret['msg'] = "<span style='color:red'>Corriger les erreurs pour pouvoir continuer</span>";
}
echo json_encode($ret);
die;