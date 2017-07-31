<?php
// Connexion à la base de données
require_once('includes/db.php');
require_once('includes/fonctions.php');

// Définition titre page
$titrePage = "Suppression d'un dirigeant";

// Headers html: <head> + titres
include('parties/header.php');

// Vérifier si un ID est passé
if(isset($_GET['id']) && !empty($_GET['id'])){
  echo 'Un id est passé';
  // Vérifier si l'enregistrement existe
  $sql = 'SELECT id FROM dirigeants WHERE id = '
         . mysqli_real_escape_string($connection, $_GET['id']);
  if(!$resultats = mysqli_query($connection, $sql)){
    echo '<div class="alert alert-danger">'
         . 'Une erreur est survenue lors de la suppression'
         . mysqli_error($connection)
         . '</div>';
  } else {
    if(mysqli_num_rows($resultats) === 0){
      echo '<div class="alert alert-danger">'
           . 'Ce dirigeant n\'existe pas'
           . '</div>';
    }else{
      // Supprimer l'élément
      $sql='DELETE FROM dirigeants WHERE id = '
           . mysqli_real_escape_string($connection, $_GET['id']);

      if(!mysqli_query($connection, $sql)){
        echo '<div class="alert alert-danger">'
             . 'Une erreur est survenue lors de la suppression'
             . mysqli_error($connection)
             . '</div>';
      }else{
        echo '<div class="alert alert-success">'
             . 'Le dirigeant a été supprimé.'
             . '</div>'
             . '<a href="dirigeants.php">Retours à la liste</a>';
      }
    }
  }

} else {
  echo '<div class="alert alert-danger">'
       . 'Vous n\'avez pas précisé d\'élément à supprimer.'
       . '</div>';
}
include('parties/footer.php');
