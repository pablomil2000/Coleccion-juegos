<?php
// Establecer el código de respuesta HTTP a 404
http_response_code(404);
?>


<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <div class="container d-flex align-items-center flex-column">
    <!-- Masthead Avatar Image-->
    <img class="masthead-avatar mb-5" src="<?= $GLOBALS['RouteCtrl']->domain ?>/views/assets/img/homeLogo.png"
      alt="..." />
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">404</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
      <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Pagina no encontrada, llama a forcen para arreglar esto</p>
  </div>
</header>