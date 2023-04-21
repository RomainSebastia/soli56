<!-- Début du header -->
<?php
include('app/views/vueHeader.php');
?>
<!-- Fin du header -->


<!-- Affichage de la page d'accueil  -->
<main class="accueil">


  <!-- Présentation rapide l'association et du site -->
  <div id="resume">
    <p>Bienvenue sur le site Soli'56.</p>
    <p>Nous sommes une association solidaire.</p>
    <p>Ce site vous permet de découvrir les services gratuits dans votre ville.</p>
  </div>


  <!-- Affichage de la fleur (Bleuet signe de la solidarité) au centre de la page -->
  <img src="data/images/accueil/bleuetAccueil.png">


  <!-- Bouton qui permet d'accéder à une page qui liste les catégories -->
  <div class="entrez">
    <button>
      <a href="./?action=category"><span>ENTREZ</span></a>
    </button>
  </div>

</main>


<!-- Début du footer -->
<?php
include('app/views/vueFooter.php');
?>
<!-- Fin du footer -->