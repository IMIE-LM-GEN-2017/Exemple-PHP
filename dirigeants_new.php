<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Nouveau dirigeant";

// Headers html: <head> + titres
include('parties/header.php');

var_dump($_POST);

$testDuFormulaire = verifierFormulaire(['nom', 'prenom', 'email', 'tel', 'id_adresse']);
if($testDuFormulaire === false){
  echo "C'est faux";
} elseif($testDuFormulaire === true) {
  echo "Le formulaire est valide.";
  // traitement et enregistrement.
  $sql="INSERT INTO dirigeants (nom, prenom, email, tel, id_adresse)
        VALUES ('" . mysqli_real_escape_string($connection, $_POST['nom']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['prenom']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['email']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['tel']) . "',
                '" . mysqli_real_escape_string($connection, $_POST['id_adresse']) . "')";
  var_dump($sql);
  if(mysqli_query($connection, $sql)){
    echo '<div class="alert alert-success">
    L\'enregistrement a bien été effectué</div>';
  } else {
    echo '<div class="alert alert-danger">
    L\'enregistrement du dirigeant a échoué.<br>';
    echo mysqli_error($connection);
    echo "<pre>$sql</pre>";
    echo '</div>';
  }

  echo '<a href="dirigeants.php">Retours à la liste</a>';
  echo '<a href="dirigeants_new.php">Ajouter une nouvelle dirigeant</a>';

} else {
  echo "Le formulaire n'a pas été envoyé";
}


if($testDuFormulaire !== true):
  $sql="SELECT * FROM adresses";
  if(!$adresses = mysqli_query($connection, $sql)):
    echo '<div class="alert alert-danger">Une erreur est survenue.'
         . mysqli_error($connection)
         . '</div>';
  else:
?>
<!-- Lien pour aller à la liste -->
<a href="dirigeants.php">Liste des dirigeants</a>

<!-- Formulaire -->
<form action="dirigeants_new.php" method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="tel">Téléphone</label>
    <input name="tel" type="text" class="form-control" id="tel" placeholder="Téléphone">
  </div>
  <div class="form-group">
    <label for="id_adresse">Adresse</label>
    <select name="id_adresse" id="id_adresse" class="form-control">
      <?php
        while($ligne = mysqli_fetch_assoc($adresses)):
          echo '<option value="'.$ligne['id'].'">'
               .$ligne['nom'] . ', '
               .$ligne['cp'] . ' - '
               .$ligne['ville'] . ' '
               .'</option>';
        endwhile;
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
  endif;
endif;
include('parties/footer.php');
