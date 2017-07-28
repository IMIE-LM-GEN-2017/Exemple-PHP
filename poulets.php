<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Liste des adresses";

// Headers html: <head> + titres
include('parties/header.php');

// Liste des champs sur lesquels on peut trier
$champsTriables= ['id', 'id_ferme', 'race'];

// Test de $_GET
$ordreDeTri = testOrderBy($champsTriables, 'id_ferme', 'ASC');

// Champ et direction de tri par défaut
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM poulets ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
// if(!$resultats = mysqli_query($connection, $sql));
?>
<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th>
        id
        <a href="?order=id&amp;direction=ASC">+</a>
        <a href="?order=id&amp;direction=DESC">-</a>
      </th>
      <th>
        race
        <a href="?order=race&amp;direction=ASC">+</a>
        <a href="?order=race&amp;direction=DESC">-</a>
      </th>
      <th>
        id_ferme
        <a href="?order=id_ferme&amp;direction=ASC">+</a>
        <a href="?order=id_ferme&amp;direction=DESC">-</a>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(mysqli_num_rows($resultats) === 0):
      echo "<tr><td>Il n'y a pas d'enregistrements</td></tr>";
    else:
      // Affichage des lignes de résultat
      while($ligne = mysqli_fetch_assoc($resultats)):
        //var_dump($ligne);
      ?>
      <tr>
        <td><?= $ligne['id'] ?></td>
        <td><?= $ligne['race'] ?></td>
        <td><?= $ligne['id_ferme'] ?></td>
      </tr>
      <?php
      endwhile;
    endif;
    ?>
  </tbody>
</table>

<?php
include ('parties/footer.php');
