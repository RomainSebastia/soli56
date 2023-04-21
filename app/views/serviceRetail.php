<!-- Début du header -->
<?php
include('app/views/vueHeader.php');
?>
<!-- Fin du header -->


<!-- Affichage des détails d'un service -->
<main class="container">


  <!-- Titre de la page -->
  <h2>
    <?= $titre ?>
  </h2>

  <?php

 // Chemin pour l'affichage des images/photos des services 
  $chemin_photo = "data/images/categories";

  // Boucle qui permet d'afficher les informations du service choisi
  foreach ($detailServices as $detailService) {
    ?>
    <div class='unService'>

      <div id="nom">
        <?= $detailService["nom"]; ?>
      </div>

      <div id="resume">
        <?= $detailService["resume"]; ?>
      </div>

      <div id="adresse">
        Adresse :
        <?= $detailService["num_rue"] ?>
        <?= $detailService["nom_rue"] ?> &nbsp;
        <?= $detailService["cp"] ?>&nbsp;
        <?= $detailService['ville']; ?>
      </div>

      <div id="tel">
        Téléphone :
        <?= $detailService["tel"]; ?>
      </div>

      <div id="mail">
        Mail :
        <?= $detailService["mail"]; ?>
      </div>

      <div id="ouverture">
        Jours d'ouverture et horaires :
        <?= $detailService["ouverture"]; ?>
      </div>

      <div id="site">
        <a href="<?= $detailService['site_web']; ?>">
          Site web :
          <?= $detailService["nom"]; ?>
        </a>
      </div>

      <div id="photo">
        <img src="<?= $chemin_photo?>/<?=$detailService['photo']; ?>" alt="<?=substr($detailService['nom'],0,10);?>">
      </div>

    </div>
    <?php
  }
  ?>

</main>

<!-- <footer> -->
<?php
include('app/views/vueFooter.php');
?>
<!-- </footer> -->