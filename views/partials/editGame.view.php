<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <div class="container d-flex align-items-center flex-column">
    <!-- Icon Divider-->

    <?php
    if (isset($error)) {
      echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    } else if (isset($ready)) {
      echo '<div class="alert alert-success" role="alert">' . $ready . '</div>';
    }
    ?>
    <form action="" method="post" class="container justify-content-center col-12" enctype="multipart/form-data">
      <div class="col-12 row m-3 justify-content-center">
        <div class="col-6 ">
          <label for="title" class="form-label">Titulo</label>
          <input type="text" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="titulo" value="<?= $game['titulo'] ?>">
        </div>
      </div>

      <div class="col-12 row m-3 justify-content-center">
        <div class="col-4">
          <label for="title" class="form-label">Portada</label>
          <div class="container m-3">
            <img class="img-fluid rounded mb-5 min-vh-10"
              src="<?= $Funciones->helperImage($game['Portada'], '/views/assets/img/games/' . $game['Portada']) ?>"
              alt="" id="preview">
          </div>
          <input type="file" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="fileUpload" onchange="readURL(this)">
        </div>
        <div class="col-4 container">
          <div class="col-6 m-5">
            <label for="title" class="form-label">Fecha de lanzamiento</label>
            <input type="date" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
              value="<?= $game['salida'] ?>" name="salida">
          </div>

          <div class="col-6 m-5">
            <label for="title" class="form-label">Nota:</label>
            <input type="number" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
              value="<?= $game['Nota'] ?>" name="nota" min="0" max="100">
          </div>

          <div class="col-6 m-5">
            <label for="title" class="form-label">Plataformas:</label>

            <div class="container">
              <select class="js-example-basic-multiple" name="plataforma[]" multiple="multiple">

                <?php
                $plataformasGame = $gameplataformaCtrl->getByField(
                  [
                    'column' => 'juego_id',
                    'value' => $game['id']
                  ]
                );
                foreach ($plataformas as $key => $plataforma) {
                  var_dump(in_array($plataforma['id'], array_column($plataformasGame, 'plataforma_id')));
                  // Si la plataforma está en la lista de plataformas del juego, la seleccionamos 
                  if (in_array($plataforma['id'], array_column($plataformasGame, 'plataforma_id'))) {
                    ?>
                    <option style="color: black;" value="<?= $plataforma['id'] ?>" selected>
                      <?= $plataforma['icono'] . $plataforma['nombre'] ?>
                    </option>
                    <?php
                  } else {
                    ?>
                    <option style="color: black;" value="<?= $plataforma['id'] ?>">
                      <?= $plataforma['icono'] . $plataforma['nombre'] ?>
                    </option>
                    <?php
                  }
                }
                ?>

              </select>
            </div>
          </div>
          <div class="container">
            <div class="col-6"><label for="desarrolladores_id">desarrolladora</label>
              <select name="desarrolladores_id" class="form-select">
                <option value="0" selected>Otra</option>
                <?php
                foreach ($companies as $key => $company) {
                  ?>
                  <option value="<?= $company['id'] ?>" <?php
                    if ($game['desarrolladores_id'] == $company['id']) {
                      echo 'selected';
                    }
                    ?>><?= $company['nombre'] ?>
                  </option>
                  <?php
                }
                ?>

              </select>
            </div>
            <div class="col-6"><label for="distribuidora_id">Distribuidora</label>
              <select name="distribuidora_id" class="form-select">
                <option value="0" selected>Otra</option>
                <?php
                foreach ($companies as $key => $company) {
                  ?>
                  <option value="<?= $company['id'] ?>" <?php
                    if ($game['distribuidora_id'] == $company['id']) {
                      echo 'selected';
                    }
                    ?>><?= $company['nombre'] ?>
                  </option>
                  <?php
                }
                ?>


              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row m-3 justify-content-center">
        <div class="col-6">
          <label for="title" class="form-label">Sinopsis</label>
          <textarea name="sinopsis" id="summernote" rows="10" style=""><?= $game['Sinopsis'] ?></textarea>
        </div>
      </div>

      <div class="row m-3 justify-content-center">
        <div class="col-6">
          <label for="title" class="form-label">Trailer</label>
          <input type="text" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="trailer" value="<?= $game['trailer_code'] ?>" placeholder="WYxvjBsAZog">
          <!-- helper -->
          <div id="titleHelper" class="form-text">Introduce el código del trailer de youtube. (WYxvjBsAZog)</div>
        </div>
      </div>

      <!-- submit -->
      <div class="row m-6 justify-content-center">
        <div class="col-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</header>

<script>
  // preview image before upload
  function readURL (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $(document).ready(function () {
    $('#summernote').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
      ]
    });
    $('.form-select').select2();
  });
  $(document).ready(function () {
    $('.js-example-basic-multiple').select2();
  });

</script>