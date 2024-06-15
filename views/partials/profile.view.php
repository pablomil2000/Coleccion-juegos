<header class="masthead bg-primary text-white text-center">
  <div class="container align-items-center flex-column">
    <!-- Perfil del usuario -->
    <section class="col-2 page-section profile" id="profile">
      <div class="container">
        <!-- Profile Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary">Perfil</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-user"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Profile Grid Items-->
        <div class="card-container row justify-content-center">
          <div class="card-profile">
            <div class="card-profile-header">
              <img src="<?= $GLOBALS['RouteCtrl']->domain ?>assets/img/profile.jpg" alt="profile"
                class="card-profile-img">
            </div>
            <div class="card-profile-body">
              <h3 class="card-profile-title">Nombre: <?= $user['nombre'] ?></h3>
              <!-- <p class="card-profile-text">Email: <?= $user['email'] ?></p> -->
              <p class="card-profile-text">Rol: <?= $user['rol_id'] ?></p>
              <!-- <p class="card-profile-text">Fecha de creación: <?= $user['created_at'] ?></p> -->
              <!-- <p class="card-profile-text">Fecha de actualización: <?= $user['updated_at'] ?></p> -->
            </div>
            <div class="card-profile-footer">
              <?php
              if ($user['id'] === $_SESSION['user']['id']) {
                ?>
                <a class="btn btn-primary btn-xs" href="<?= $GLOBALS['RouteCtrl']->domain ?>edit/profile">Editar
                  Perfil</a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Seccion de mis juegos -->
    <section class="col-10 page-section profile" id="profile">
      <div class="container">
        <!-- Profile Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary">Mis juegos</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>

        <!-- Profile Grid Items-->
        <div class="card-container row justify-content-center">

          <!-- games cards -->
          <?php
          foreach ($mygames as $key => $mygame) {
            include ('views/modules/gameCard2.php');
            ?>
            <?php
          }
          ?>
        </div>
      </div>
    </section>
  </div>
</header>