<!-- Games Item -->
<div class="col-md-6 col-lg-2 mb-5" data-nota="<?= $game['Nota'] ?>">
  <div class="card-game game-item mx-auto" data-bs-toggle="modal" data-bs-target="#gameModal<?= $game['id'] ?>">
    <div class="game-item-caption d-flex align-items-center justify-content-center h-100 w-100">
      <div class="game-item-caption-content text-center"><?= $game['titulo'] ?></div>
    </div>
    <img class="img-fluid min-vh-10" loading="lazy"
      src="<?= $Funciones->helperImage($game['Portada'], '/views/assets/img/games/' . $game['Portada']) ?>" alt="..." />
  </div>
</div>

<div class="game-modal modal fade" id="gameModal<?= $game['id'] ?>" tabindex="-1"
  aria-labelledby="gameModal<?= $game['id'] ?>" aria-hidden="true">
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
                  <img class="img-fluid rounded mb-5 min-vh-10" loading="lazy"
                    src="<?= $Funciones->helperImage($game['Portada'], '/views/assets/img/games/' . $game['Portada']) ?>"
                    alt="..." style="max-height: 40vh" />
                </div>
                <div class="col-8 m-2">
                  <!-- game Modal - Titel-->
                  <h2 class="game-modal-title text-secondary text-uppercase mb-0"><?= $game['titulo'] ?></h2>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <h5 class="game-modal-subtitle text-secondary text-uppercase mb-0">
                      <?= $Funciones->dateFormat($game['salida'], 'Y') ?>
                    </h5>
                    <div class="divider-custom-line"></div>
                  </div>
                  <!-- game Modal - Text-->
                  <div class="text-secondary text-justify">
                    <?= $game['Sinopsis'] ?>
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
                        Informacion del juego
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                      <div class="accordion-body">
                        <div class="d-flex">
                          <div class="col-12 d-flex justify-content-between">
                            <!-- nota -->
                            <div>
                              <div class="col-2 p-2 rounded " style="min-width: fit-content;">
                                <h4 class="text-secondary">Desarrolladora</h4>
                                <h5 class="text-secondary">
                                  <?= $companyCtrl->getBy(['id' => $game['desarrolladores_id']])[0]['nombre'] ?>
                                </h5>
                              </div>
                            </div>
                            <div class="d-flex">
                              <?php
                              include ('views/partials/nota.view.php')
                                ?>
                            </div>
                            <div>
                              <div class="col-2 p-2 rounded" style="min-width: fit-content;">
                                <h4 class="text-secondary">Distribuidores</h4>
                                <h5 class="text-secondary">
                                  <?= $companyCtrl->getBy(['id' => $game['distribuidora_id']])[0]['nombre'] ?>
                                </h5>
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
                        Trailer
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                      <div class="accordion-body">
                        <?php

                        if ($game['trailer_code'] != '') {
                          ?>
                          <iframe width="560" height="315" loading="lazy"
                            src="https://www.youtube.com/embed/<?= $game['trailer_code'] ?>?si=_2LD9KMoVxzKu4rU"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                          <?php
                        } else {
                          ?>
                          <div class="alert alert-danger" role="alert">
                            No hay trailer disponible
                          </div>
                          <?php
                        }
                        ?>
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
                <a class="btn btn-primary" href="<?= $GLOBALS['RouteCtrl']->domain ?>edit/game/<?= $game['id'] ?>">
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