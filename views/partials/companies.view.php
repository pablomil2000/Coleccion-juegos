<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <!-- login form -->
  <div class="container d-flex align-items-center flex-column">
    <!-- Games Section-->
    <section class="page-section game" id="game">
      <div class="container">
        <!-- Games Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary">Compañias</h2>
        <!-- button new game -->
        <?php

        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == '2') {
          ?>
          <a class="btn btn-primary btn-xs" href="<?= $GLOBALS['RouteCtrl']->domain ?>new/company">Nueva compañia</a>
          <?php
        }
        ?>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Games Grid Items-->
        <div class="card-container row justify-content-center">
          <?php
          foreach ($companies as $company) {
            if ($company['id'] != '0')
              include ('views/modules/companyCard.php');
          }
          ?>
        </div>
      </div>
    </section>
  </div>
</header>

<script>
  // sort by data-nota
  var $divs = $("div.card-game");
  var ordered = $divs.sort(function (a, b) {
    return $(a).data("nota") - $(b).data("nota")
  });
</script>