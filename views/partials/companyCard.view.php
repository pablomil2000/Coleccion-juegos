<!-- Games Item -->
<div class="col-md-6 col-lg-3 mb-5">
  <div class="card-game game-item mx-auto" data-bs-toggle="modal" data-bs-target="#companyModal<?= $company['id'] ?>">
    <div class="game-item-caption d-flex align-items-center justify-content-center h-100 w-100">
      <div class="game-item-caption-content text-center">
        <?= $company['nombre'] ?>
      </div>
    </div>
    <img class="min-vh-10 img-fluid  lazyload"
      src="<?= $Funciones->helperImage($company['logo'], 'views/assets/img/companies/' . $company['logo']) ?>"
      alt="<?= $company['nombre'] ?>" />
  </div>
</div>

<div class="game-modal modal fade" id="companyModal<?= $company['id'] ?>" tabindex="-1"
  aria-labelledby="companyModal<?= $company['id'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
          aria-label="Close"></button></div>
      <div class="modal-body text-center pb-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <!-- game Modal - Title-->
              <div class="d-flex">
                <div class="col-4 m-2">
                  <!-- game Modal - Image-->
                  <img class="img-fluid rounded mb-5 min-vh-10"
                    src="<?= $Funciones->helperImage($company['logo'], '/views/assets/img/companies/' . $company['logo']) ?>"
                    alt="<?= $company['nombre'] ?>" style="max-height: 40vh" />
                </div>
                <div class="col-8 m-2">
                  <!-- game Modal - Titel-->
                  <h2 class="game-modal-title text-secondary text-uppercase mb-0">
                    <?= $company['nombre'] ?>
                  </h2>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-line"></div>
                  </div>
                  <!-- game Modal - Text-->
                  <div class="text-justify text-secondary">
                    <?= $company['historia'] ?>
                  </div>
                </div>
              </div>
              <div class="col-12 m-2">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Informacion de la compañia
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                      <div class="accordion-body">
                        <div class="d-flex">
                          <div class="col-6">
                            <!-- nota -->
                            <div class="col-12 d-flex justify-content-between">
                              <!-- nota -->
                              <div class="container col-6">
                                <?php
                                $nota = $companyCtrl->notaMedia($company['id']);

                                if ($nota < 30) {
                                  $nota = 'danger';
                                } elseif ($nota < 50) {
                                  $nota = 'danger';
                                } elseif ($nota < 60) {
                                  $nota = 'warning';
                                } elseif ($nota < 90) {
                                  $nota = 'primary';
                                } else {
                                  $nota = 'success';
                                }
                                ?>
                                <div class="col-3 p-2 bg-<?= $nota ?> rounded" style="min-width: fit-content;">
                                  <h4 class="text-secondary">Nota media</h4>
                                  <h5 class="text-secondary"><?= $companyCtrl->notaMedia($company['id']) ?></h5>
                                </div>
                              </div>

                              <div class="d-flex col-6">
                                <div class="col-3 p-2 bg-primary rounded" style="min-width: fit-content;">
                                  <h4 class="text-secondary">Nacionalidad</h4>
                                  <h5 class="text-secondary">
                                    <?= $countryCtrl->getBy(["id" => $company['pais_id']])[0]['name'] ?>
                                  </h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Juegos de la compañia
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <div class="card-container row justify-content-center">

                          <?php
                          $games = $gameCtrl->getBy(['desarrolladores_id' => $company['id'], 'distribuidora_id' => $company['id']], 'OR');
                          // var_dump($games);
                          foreach ($games as $game) {
                            require ('views/modules/gameCard3.php');
                          }
                          ?>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Spoilers alert
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        Aqui van los comentarios de los usuarios
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Icon Divider-->
              <button class="btn btn-primary" data-bs-dismiss="modal">
                <i class="fa-solid fa-arrow-left"></i> Volver
              </button>

              <?php
              if ($_SESSION['user']['lvl'] >= 50) {
                ?>
                <a class="btn btn-primary" href="<?= $GLOBALS['RouteCtrl']->domain ?>edit/company/<?= $company['id'] ?>">
                  <i class="fa-solid fa-pencil"></i> Editar
                </a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Justificar texto
  document.querySelectorAll('.text-justify').forEach((element) => {
    element.style.textAlign = 'justify';
  });
</script>