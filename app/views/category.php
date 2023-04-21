<!-- Début du header -->
<?php
include('app/views/vueHeader.php');
?>
<!-- Fin du header -->

<!-- Affichage des catégories -->
<main class="container">

  <!-- Titre de la page -->
  <h2>
    <?= $titre ?>
  </h2>

  <!-- Affichage en grid des catégories -->
  <div class="categories-grid">

    <!-- Vue de la liste des catégories pour l'utilisateur -->
    <?php

    // Chemin pour l'affichage des icônes des catégories
    $chemin_image = "data/images/icones";

    // Boucle qui permet d'afficher le nom et l'icôn de chaque catégories
    foreach ($listCategory as $category) {
      ?>

      <div class='category'>
        <!-- Chemin vers la page des services liées à une catégorie -->
        <a href='./?action=service&ID=<?= $category['ID']; ?>'>

          <!-- Affichage dans des boutons -->
          <button>

            <!-- nom de la catégorie -->
            <?= $category["nom"]; ?>
            <!-- Chemin et nom de l'icône -->
            <img src="<?= $chemin_image; ?>/<?= $category["icone"]; ?>" alt="<?= $category["nom"]; ?> width=80% ">

          </button>

        </a>
        
      </div>

      <?php
    }
    ?>

  </div>

</main>


<!-- Début du footer -->
<?php
include('app/views/vueFooter.php');
?>
<!-- Fin du footer -->