<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Nouvelle adresse";

// Headers html: <head> + titres
include('parties/header.php');

var_dump($_POST);

$testDuFormulaire = verifierFormulaire(['nom', 'cp', 'ville']);
if($testDuFormulaire === false){
  echo "C'est faux";
} elseif($testDuFormulaire === true) {
  echo "Le formulaire est valide.";
  // traitement et enregistrement.
  $sql="INSERT INTO adresses (nom, cp, ville)
        VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['cp']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['ville']) . "')";
  var_dump($sql);
  if(mysqli_query($connection, $sql)){
    echo '<div class="alert alert-success">
    L\'enregistrement a bien été effectué</div>';
  } else {
    echo '<div class="alert alert-danger">
    L\'enregistrement de la l\'adresse a échoué.<br>';
    echo mysqli_error($connection);
    echo "<pre>$sql</pre>";
    echo '</div>';
  }

  echo '<a href="adresses.php">Retours à la liste</a>';
  echo '<a href="adresses_new.php">Ajouter une nouvelle adresse</a>';

} else {
  echo "Le formulaire n'a pas été envoyé";
}


if($testDuFormulaire !== true):
?>
<!-- Lien pour aller à la liste -->
<a href="adresses.php">Liste des adresses</a>

<!-- Formulaire -->
<form action="adresses_new.php" method="POST">
  <div class="form-group">
    <label for="nom">Adresse</label>
    <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="cp">Code postal</label>
    <input name="cp" type="text" class="form-control" id="cp" placeholder="Code postal">
  </div>
  <div class="form-group">
    <label for="ville">Ville</label>
    <input name="ville" type="text" class="form-control" id="ville" placeholder="Ville">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
endif;
include('parties/footer.php');
