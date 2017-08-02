<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Connexion au site internet";
// Headers html: <head> + titres
include('parties/header.php');

$erreur= false;
$succes= false;
if(verifierFormulaire(['email', 'password']) === true){
  $sql="SELECT * FROM dirigeants"
       ." WHERE email='"
       .mysqli_real_escape_string($connection, $_POST['email'])
       ."' AND mdp='"
       .mysqli_real_escape_string($connection, md5($_POST['password']))
       ."'";
  $resultat = executerRequete($connection, $sql);
  if($resultat !== false && mysqli_num_rows($resultat) > 0){
    $utilisateur = mysqli_fetch_assoc($resultat);
    $_SESSION['utilisateur'] = $utilisateur;
    $succes = true;
  }else{
    $erreur=true;
  }
}

if($erreur === true){
  alert('danger', 'Identifiants invalides');
}elseif($erreur === false && $succes === true){
  alert('success', 'Bienvenue, ' . $utilisateur['prenom']);
}else{
  ?>
  <form action="login.php" method="post">
    <input type="text" name="email" placeholder="Email">
    <br>
    <input type="password" name="password" placeholder="Mot de passe">
    <br>
    <button type="submit">Connexion</button>
  </form>
  <?php
}
include('parties/footer.php');
