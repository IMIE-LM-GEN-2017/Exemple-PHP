<?php
$server = "127.0.0.1";
$username = "vagrant";
$password = "123";
$db = "vagrant";
// Création de la connexion:
$connection = mysqli_connect( $server, $username, $password, $db );

// Test de la connexion:
if(!$connection){
  die('Impossible de se connecter à la base de données');
}
