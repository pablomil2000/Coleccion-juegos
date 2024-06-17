<nav class="navbar fixed-top text-uppercase navbar-expand-lg bg-secondary " id="mainNav">
  <div class="container d-flex justify-content-between">
    <div>
      <a class="navbar-brand" href="<?= $GLOBALS['RouteCtrl']->domain ?>home">La buhardilla</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
      </ul>
      <span class="navbar-text">
        <ul class="navbar-nav me-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?= $GLOBALS['RouteCtrl']->domain ?>home">Inicio</a>
          </li>
          <?php
          if ($Funciones->hasLogin()) {
            include ('./views/layouts/partials/navLogin.view.php');
          } else {
            include ('./views/layouts/partials/navGuest.view.php');
          }
          ?>
        </ul>

      </span>
    </div>
  </div>
</nav>