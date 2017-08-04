<?php
// Fichier en question
$fichier = './fichier.html';

// Enregistrement si on a envoyé le formulaire
if(isset($_POST['contenu'])){
  if(!$fichierOuvert = fopen($fichier, 'w')){
    die('Impossible d\'ouvrir le fichier pour écrire dedans: '.$fichier );
  }
  fwrite($fichierOuvert, $_POST['contenu']);
  fclose($fichierOuvert);
}

/*
 * Exemple de lecture: ligne par ligne : on affiche que la ligne 5
 */
$contenu = fopen($fichier, 'r');

$nbligne = 1;
if ($contenu) {
  while (($ligne = fgets($contenu, 4096)) !== false) {
    if($nbligne === 5){
      echo "Ligne : ". $nbligne;
      echo htmlentities($ligne);
    }
    $nbligne ++;
  }
  if (!feof($contenu)) {
    echo "Error: unexpected fgets() fail\n";
  }
  fclose($contenu);
 }

/*
 * Exemple de lecture: tout le fichier
 */
if(!$fichierOuvert = fopen($fichier, 'r')){
  die('Impossible d\'ouvrir le fichier '.$fichier );
}

$contenu = fread($fichierOuvert, filesize($fichier));

fclose($fichierOuvert);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editeur de fichiers</title>
  </head>
  <body>
    <form action="index.php" method="post">
      <textarea name="contenu" rows="8" cols="80"><?= $contenu ?></textarea>
      <br>
      <button type="submit" name="button">Enregistrer</button>
    </form>
  </body>
</html>
