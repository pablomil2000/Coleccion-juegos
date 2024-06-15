<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <!-- login form -->
  <div class="container d-flex align-items-center flex-column">
    <!-- Games Section-->
    <section class="page-section game" id="game">
      <div class="container">
        <!-- Games Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary"><?= $collection['nombre'] ?></h2>
        <!-- button new game -->
        <?php
        if ($_SESSION['user']['id'] == $collection['user_id']) {
          ?>
          <a class="btn btn-primary btn-xs"
            href="<?= $GLOBALS['RouteCtrl']->domain ?>edit/collection/<?= $collection['id'] ?>">Editar
            collection</a>
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
          foreach ($games as $game) {
            $game = $gameCtrl->getBy(['id' => $game['game_id']])[0];
            include ('views/modules/gameCard.php');
          }
          ?>
        </div>
      </div>
    </section>
  </div>
</header>