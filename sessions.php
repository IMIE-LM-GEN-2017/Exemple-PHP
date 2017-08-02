<?php

session_start();

if(!isset($_SESSION['compteur'])){
  $_SESSION['compteur'] = 0;
}

if(isset($_GET['action']) && $_GET['action'] === 'destroy'){
  session_destroy();
}

$_SESSION['compteur'] += 2;

$compteur = 0;
$compteur +=1;

echo "compteur: ".$compteur;
echo '<br>';
echo "session:" .$_SESSION['compteur'];
?>
<br>
<a href="?action=destroy">Détruire la session</a>
