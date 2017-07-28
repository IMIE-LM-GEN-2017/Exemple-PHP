<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $titrePage ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>

    <!-- Menu -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pouletto</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Fermes</a></li>
            <li><a href="dirigeants.php">Dirigeants</a></li>
            <li><a href="adresses.php">Adresses</a></li>
            <li><a href="employes.php">Employes</a></li>
            <li><a href="poulets.php">Poulets</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /Menu -->

    <!-- Contenu de la page -->
    <div class="container-fluid">
      <!-- Titre de page -->
      <h1><?= $titrePage ?></h1>
