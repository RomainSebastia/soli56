<!-- Début du header -->
<?php
include('app/views/vueHeader.php');
?>
<!-- Fin du header -->





<!-- Affichage des services en fonction de la catégorie sélectionnée -->
<main class="container">

<!-- titre de la page -->
<h2>
  <?= $titre ?>
</h2>

  <?php
  // Boucle qui permet l'affichage du titre du service et de son résumé
  foreach ($listService as $service) {
    ?>
    <div class='service'>

      <p>
        <!-- Lien vers les détail d'un service -->
        <a href='./?action=retail&ID=<?= $service['ID']; ?>'>

          <!-- Titre du service -->
          <?= $service["nom"]; ?>

        </a>
      </p>

      <p>
        <!-- Résumé du service -->
        <?= substr($service["resume"],0,80); ?>...
      </p>

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