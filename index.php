<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Liste des fermes";

// Headers html: <head> + titres
include('parties/header.php');

// Liste des champs sur lesquels on peut trier
$champsTriables= ['id', 'nom', 'surface', 'id_adresse', 'id_dirigeant'];
$listeDesChamps= [
  "id" => "ID",
  "nom" => "Nom",
  "surface" => "Surface",
  "id_adresse" => "Adresse",
  "id_dirigeant" => "Dirigeant",
];
// Test de $_GET
$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');

// Champ et direction de tri par défaut
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM fermes ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>
<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <?= tableHeaders($listeDesChamps) ?>
    </tr>
  </thead>
  <tbody>
    <?php
    // Affichage des résultats
    if(mysqli_num_rows($resultats) === 0):
      echo "<tr><td colspan='5'>Il n'y a pas d'enregistrements</td></tr>";
    else:
      // Affichage des lignes de résultat
      while($ligne = mysqli_fetch_assoc($resultats)):
        //var_dump($ligne);
      ?>
      <tr>
        <?php
        foreach ($listeDesChamps as $cle => $valeur) {
          echo "<td>".$ligne[$cle] ."</td>";
        }
        ?>
      </tr>
      <?php
      endwhile;
    endif;
    ?>
  </tbody>
</table>

<?php
include ('parties/footer.php');
