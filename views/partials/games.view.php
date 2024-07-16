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
          <div class="row col-12 justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <!-- Search -->
              </div>
              <div class="input-group d-flex col-12">
                <input id="search-input" type="text" class="form-control" name="search" placeholder="Buscar..."
                  value="<?= $search ?>" style="min-width: 300px;">
                <button class=" input-group-text" id="search-button" role="search"><i
                    class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </form>
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <?php
        if (count($games) > 0) {
          ?>
          <!-- Games Grid Items-->
          <div class="card-container row justify-content-center" style="width: 60vw;">
            <?php
            foreach ($games as $game) {
              // var_dump($game);
              include ('views/modules/gameCard.php');
            }
            ?>
          </div>
          <!-- Paginacion -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?= $pagination->getPagination() ?>
            </ul>
          </nav>
          <?php
        } else {
          ?>
          <div class="alert alert-warning" role="alert">
            No se encontraron resultados
          </div>
          <?php
        }
        ?>
      </div>
    </section>
  </div>
</header>


<script>
  saveCompanies(<?= json_encode($companies) ?>);
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