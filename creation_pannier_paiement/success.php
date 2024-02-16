<?php 
require_once('src/stripe_traitement/secrets.php');

$idCart = $_GET['idCart'];
$status = $_GET['status'];
$baseUrl = getBaseUrl();

echo 'Votre paiement a bien été pris en compte ...<br>';
echo "id de la commande : <strong>$idCart</strong><br>";
echo "status : <strong>$status</strong><br>";

echo "<a href='$baseUrl'>retour à l'index</a>";
