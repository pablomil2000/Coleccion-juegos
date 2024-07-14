<div class="game-modal modal fade" id="gameModal" tabindex="-1" aria-labelledby="gameModal" aria-hidden="true">
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
                  <img class="img-fluid rounded mb-5 min-vh-10" id="game-modal-img" loading="lazy"
                    src="<?= $GLOBALS['RouteCtrl']->domain ?>" alt="..." style="max-height: 40vh" />
                </div>
                <div class="col-8 m-2 text-secondary">
                  <!-- game Modal - Titel-->
                  <h2 class="game-modal-title text-secondary text-uppercase mb-0" id="game-modal-title">Titulo</h2>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>

                    <!-- game Modal - release date -->
                    <h5 class="game-modal-subtitle text-secondary text-uppercase mb-0">
                      <!-- Release date -->
                    </h5>
                    <div class="divider-custom-line"></div>
                  </div>
                  <!-- game Modal - Text-->
                  <div class="text-justify">
                    <p class="mb-4 text-secondary" id="game-modal-sinopsis">Sinopsis</p>
                    <div class="mb-4 text-secondary">
                      <h4 class="text-secondary text-decoration-underline">Plataformas</h4>
                      <div class="card-container row justify-content-center">
                        <!-- Plataformas -->
                      </div>
                    </div>
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
                                <h4 class="text-secondary">Desarrolladora:</h4>
                                <h5 class="text-secondary" id="game-modal-developer">
                                  <!-- Desarrolladores -->
                                </h5>
                              </div>
                            </div>
                            <div class="d-flex" id="game-modal-nota">
                              <?php
                              // include nota
                              include ('views/partials/nota.view.php')
                                ?>
                            </div>
                            <div>
                              <div class="col-2 p-2 rounded" style="min-width: fit-content;">
                                <h4 class="text-secondary">Distribuidora:</h4>
                                <h5 class="text-secondary" id="game-modal-distribuidora">
                                  <!-- Distribuidora -->
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
                        <!-- Trailer -->
                        <iframe id="game-modal-trailer" width="560" height="315" src="" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Comentarios de los jugadores (SPOILERS)
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

              <!-- Btn edit -->

              <div class="mt-3">
                <form action="" method="post" class="d-flex justify-content-center">
                  <input type="hidden" value="Juego_id" name="game_id">
                  <select name="plataforma_id" name="plataforma" class="form-select" style="max-width: max-content;">
                    <!-- Lo tengo plataformas -->
                  </select>
                  <button role="submit" class="btn btn-primary">
                    <i class="fa-solid fa-gamepad"></i> Lo tengo!!
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function () {
    $('.card-game').on('click', function (e) {

      let id = $(this).data('game');
      let url = $('#game-modal-img').attr('src');
      let ytUrl = 'https://www.youtube.com/embed/'
      console.log(url);
      // let sinopsis = $(this).data('sinopsis');

      let game = sinopsis[id];

      // set elements to modal
      $('#game-modal-title').text(game.titulo);
      $('#game-modal-img').attr('src', url + 'views/assets/img/games/' + game.Portada);
      $('#game-modal-nota').text(game.nota);
      $('#game-modal-sinopsis').html(game.Sinopsis);
      $('#game-modal-developer').text(game.desarrolladores_id);
      $('#game-modal-distribuidora').text(game.distribuidora_id);
      $('#game-modal-trailer').attr('src', ytUrl + game.trailer_code);

      console.table(game);
    });
  });

  // on close model
  $('#gameModal').on('hidden.bs.modal', function (e) {
    $('#game-modal-title').text('Titulo');
    $('#game-modal-img').attr('src', '');
    $('#game-modal-sinopsis').text('Sinopsis');
    $('#game-modal-nota').text('');
    $('#game-modal-developer').text('');
    $('#game-modal-distribuidora').text('');
    $('#game-modal-trailer').attr('src', '');

    // accordion-button collapsed
    $('.accordion-button').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('.accordion-collapse').ariaExpanded = false;
  });


</script>