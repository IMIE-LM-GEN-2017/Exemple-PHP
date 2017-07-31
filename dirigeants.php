<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Liste des dirigeants";

// Headers html: <head> + titres
include('parties/header.php');

// Liste des champs sur lesquels on peut trier
$champsTriables= ['id', 'nom', 'prenom', 'email', 'tel', 'id_adresse'];

// Test de $_GET
$ordreDeTri = testOrderBy($champsTriables, 'nom', 'ASC');

// Champ et direction de tri par défaut
$ordreChamp = $ordreDeTri[0];
$ordreDirection = $ordreDeTri[1];

$sql = "SELECT * FROM dirigeants ORDER BY $ordreChamp $ordreDirection";

$resultats = mysqli_query($connection, $sql);
?>
<a href="dirigeants_new.php">Nouveau dirigeant</a>
<table class="table table-condensed table-striped table-hover">
  <thead>
    <tr>
      <th>Actions</th>
      <th>
        Id
        <a href="?order=id&amp;direction=ASC">+</a>
        <a href="?order=id&amp;direction=DESC">-</a>
      </th>
      <th>
        nom
        <a href="?order=nom&amp;direction=ASC">+</a>
        <a href="?order=nom&amp;direction=DESC">-</a>
      </th>
      <th>
        prenom
        <a href="?order=prenom&amp;direction=ASC">+</a>
        <a href="?order=prenom&amp;direction=DESC">-</a>
      </th>
      <th>
        email
        <a href="?order=email&amp;direction=ASC">+</a>
        <a href="?order=email&amp;direction=DESC">-</a>
      </th>
      <th>
        tel
        <a href="?order=tel&amp;direction=ASC">+</a>
        <a href="?order=tel&amp;direction=DESC">-</a>
      </th>
      <th>
        id_adresse
        <a href="?order=id_adresse&amp;direction=ASC">+</a>
        <a href="?order=id_adresse&amp;direction=DESC">-</a>
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
        <td>
          <a href="dirigeants_delete.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
          <a href="dirigeants_edit.php?id=<?= $ligne['id']?>" class="btn btn-link btn-xs">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </td>
        <td><?= $ligne['id'] ?></td>
        <td><?= $ligne['nom'] ?></td>
        <td><?= $ligne['prenom'] ?></td>
        <td><?= $ligne['email'] ?></td>
        <td><?= $ligne['tel'] ?></td>
        <td><?= $ligne['id_adresse'] ?></td>
      </tr>
      <?php
      endwhile;
    endif;
    ?>
  </tbody>
</table>

<?php
include ('parties/footer.php');
