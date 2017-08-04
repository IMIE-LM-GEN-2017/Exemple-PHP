<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Profil d'un dirigeant";

// Headers html: <head> + titres
include('parties/header.php');

$idDirigeant = userInfo('id');

$sql = "SELECT * from fermes WHERE id_dirigeant = "
          . mysqli_real_escape_string($connection, $idDirigeant);

$fermes=executerRequete($connection, $sql);
  var_dump ($_COOKIE);
?>
<h2>Fermes de <?=userInfo('prenom') ?></h2>
<ul>

<?php

while($ferme = mysqli_fetch_assoc($fermes)):
?>
  <li><?=$ferme['nom']?></li>
<?php
endwhile;
?>
</ul>
<?php
include('parties/footer.php');
