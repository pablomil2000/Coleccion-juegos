<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <!-- login form -->
  <div class="container d-flex align-items-center flex-column">
    <!-- Games Section-->
    <section class="page-section game" id="game">
      <div class="container">
        <!-- Games Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary">Juegos</h2>
        <!-- button new game -->
        <?php

        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == '2') {
          ?>
          <a class="btn btn-primary btn-xs" href="<?= $GLOBALS['RouteCtrl']->domain ?>new/game">NUEVO JUEGO</a>
          <?php
        }
        ?>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>

        <form method="get">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <!-- Search -->
                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="<?= $search ?>">

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary text-justify">Filtrar</button>
              </div>
            </div>
          </div>
        </form>

        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Games Grid Items-->
        <div class="card-container row justify-content-center">
          <?php
          foreach ($games as $game) {
            // var_dump($game);
            include ('views/modules/gameCard.php');
          }
          ?>
        </div>
      </div>
    </section>
  </div>
  <!-- Paginacion -->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <?= $pagination->getPagination() ?>
    </ul>
  </nav>
</header>


<script>
  // Justificar texto
  document.querySelectorAll('.text-justify').forEach((element) => {
    element.style.textAlign = 'justify';

    element.childNodes.forEach((child) => {
      if (child.nodeType === 3) {
        child.nodeValue = child.nodeValue.trim();
      }
    });

  });
</script>