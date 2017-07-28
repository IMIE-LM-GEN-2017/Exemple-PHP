<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Liste des adresses";

// Headers html: <head> + titres
include('parties/header.php');

// Champ et direction de tri par défaut
$ordreChamp = 'nom';
$ordreDirection = 'ASC';
// Liste des champs sur lesquels on peut trier
$champsTriables= ['id', 'nom', 'cp', 'ville'];

// Test de $_GET
$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');

// Champ et direction de tri par défaut
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM adresses ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);

?>
<!-- Lien vers le formulaire -->
<a href="adresses_new.php">Nouvelle adresse</a>

<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th>
        id
        <a href="?order=id&amp;direction=ASC">+</a>
        <a href="?order=id&amp;direction=DESC">-</a>
      </th>
      <th>
        nom
        <a href="?order=nom&amp;direction=ASC">+</a>
        <a href="?order=nom&amp;direction=DESC">-</a>
      </th>
      <th>
        cp
        <a href="?order=cp&amp;direction=ASC">+</a>
        <a href="?order=cp&amp;direction=DESC">-</a>
      </th>
      <th>
        ville
        <a href="?order=ville&amp;direction=ASC">+</a>
        <a href="?order=ville&amp;direction=DESC">-</a>
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
        <td><?= $ligne['nom'] ?></td>
        <td><?= $ligne['cp'] ?></td>
        <td><?= $ligne['ville'] ?></td>
      </tr>
      <?php
      endwhile;
    endif;
    ?>
  </tbody>
</table>

<?php
include ('parties/footer.php');
