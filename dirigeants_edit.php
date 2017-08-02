<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

function mres($v1, $v2){
  return mysqli_real_escape_string($v1, $v2);
}
// Définition titre page
$titrePage = "Edition d'un dirigeant";

// Headers html: <head> + titres
include('parties/header.php');

// Variable pour savoir si on va afficher le formulaire.
// On met à false par défaut et on ne changera que si c'est bon
$afficherFormulaire = false;

if(isset($_POST['id']) && !empty($_POST['id'])){
  // On traite le formulaire
  $testDuFormulaire = verifierFormulaire(
    ['nom', 'prenom', 'email', 'tel', 'id_adresse']
  );

  if($testDuFormulaire === false){
    echo 'Le formulaire est incomplet';
  }elseif($testDuFormulaire === true){
    // Traitement du formulaire (enregistrement)
    // mres = mysqli_real_escape_string
    $sql = "UPDATE dirigeants SET
    nom = '" . mres($connection, $_POST['nom']) . "',
    prenom = '" . mres($connection, $_POST['prenom']) . "',
    email = '" . mres($connection, $_POST['email']) . "',
    tel = '" . mres($connection, $_POST['tel']) . "',
    id_adresse = '" . mres($connection, $_POST['id_adresse']) . "'
    WHERE id=" . mres($connection, $_POST['id']);

    if(!mysqli_query($connection, $sql)){
      echo "Erreur: " .mysqli_error($connection);
    } else {
      echo "L'enregistrement a été mis à jour."
           ."<br><a href=\"dirigeants.php\">Retours à la liste</a>";
    }
  }

  $testDuFormulaire = verifierFormulaire(
    ['mdpa', 'mdp', 'mdp2']
  );
  if($testDuFormulaire === true){
    // Vérification de l'ancien mot de passe
    $sql = "SELECT id FROM dirigeants WHERE id="
          .mysqli_real_escape_string($connection, $_POST['id'])
          ." AND mdp='"
          .mysqli_real_escape_string($connection, md5($_POST['mdpa']))
          ."'";
    $resultat = executerRequete($connection, $sql);
    if($resultat !== false && mysqli_num_rows($resultat) === 1){
      // on continue
      if($_POST['mdp'] === $_POST['mdp2']){
        $sql = "UPDATE dirigeants SET mdp='"
              .mysqli_real_escape_string($connection, md5($_POST['mdp']))
              ."'";
        if(executerRequete($connection, $sql) !== false){
          alert('success', 'Mot de passe mis à jour');
        }
      } else {
        alert('danger', 'Les mots de passe ne correspondent pas.');
      }
    }else{
      alert('danger', 'Mot de passe actuel incorrect');
    }
  }

} elseif(isset($_GET['id']) && !empty($_GET['id'])) {
  // Est-ce qu'on a un id passé dans la querystring ?
  // Requete pour selectionner le dirigeant
  $sql="SELECT * FROM dirigeants WHERE id="
       .mysqli_real_escape_string($connection, $_GET['id']);

  // Est-ce que la requête a échoué ?
  if(!$resultat = mysqli_query($connection, $sql)){
    echo "Erreur SQL : " .mysqli_error($connection);
  } else {
    // Est-ce qu'on a au moins un enregistrement ?
    if(mysqli_num_rows($resultat) > 0){
      $dirigeant = mysqli_fetch_assoc($resultat);
      $afficherFormulaire = true;
      var_dump($dirigeant);
    } else {
      echo "Ce dirigeant n'existe pas.";
    }
  }
} else {
  echo "Pas d'id";
}

$sql="SELECT * FROM adresses";
if(!$adresses = mysqli_query($connection, $sql)){
  echo '<div class="alert alert-danger">Une erreur est survenue.'
       . mysqli_error($connection)
       . '</div>';
}
if($afficherFormulaire === true):
?>
<!-- Lien pour aller à la liste -->
<a href="dirigeants.php">Liste des dirigeants</a>

<!-- Formulaire -->
<form action="dirigeants_edit.php" method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input required value="<?= $dirigeant['nom'] ?>" name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input required value="<?= $dirigeant['prenom'] ?>" name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input required value="<?= $dirigeant['email'] ?>" name="email" type="text" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="tel">Téléphone</label>
    <input required value="<?= $dirigeant['tel'] ?>" name="tel" type="text" class="form-control" id="tel" placeholder="Téléphone">
  </div>
  <div class="form-group">
    <label for="id_adresse">Adresse</label>
    <select name="id_adresse" id="id_adresse" class="form-control">
      <?php
        // Affichage de la liste des adresses
        while($ligne = mysqli_fetch_assoc($adresses)):
          // Affichage d'une ligne
          echo '<option value="'.$ligne['id'].'"';
          // Selection de la "bonne" adresse
          if($ligne['id'] === $dirigeant['id_adresse']):
            echo ' selected';
          endif;
          echo '>';
          echo $ligne['nom'] . ', '
               . $ligne['cp'] . ' - '
               . $ligne['ville'] . ' '
               . '</option>';
        endwhile;
      ?>
    </select>
  </div>
  <hr>
  <div class="form-group">
    <label for="mdpa">Mot de passe actuel</label>
    <input name="mdpa" type="password" class="form-control" id="mdpa" placeholder="Mot de passe actuel">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Mot de passe">
  </div>
  <div class="form-group">
    <label for="mdp2">Confirmation</label>
    <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Confirmation du mot de passe">
  </div>
  <input type="hidden" name="id" value="<?=$dirigeant['id'] ?>">
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
//   endif;
endif;
include('parties/footer.php');
