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
          <label for="title" class="form-label">Título</label>
          <input type="text" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="titulo" value="<?= $Funciones->old('title') ?>">
        </div>
      </div>

      <div class="col-12 row m-3 justify-content-center">
        <div class="col-4">
          <label for="title" class="form-label">Carátula</label>
          <div class="container m-3">
            <img class="img-fluid rounded mb-5 min-vh-10" src="#" alt="" id="preview">
          </div>
          <input type="file" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="fileUpload" onchange="readURL(this)">
        </div>
        <div class="col-4 container">
          <div class="col-6 m-5">
            <label for="title" class="form-label">Fecha de lanzamiento:</label>
            <input type="date" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
              value="<?= date('Y-m-d') ?>" name="salida">
          </div>

          <div class="col-6 m-5">
            <label for="title" class="form-label">Nota de Metacritic:</label>
            <input type="number" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
              value="0" name="nota" min="0" max="100">
          </div>

          <div class="col-6 m-5">
            <label for="title" class="form-label">Plataformas:</label>

            <div class="container">
              <select class="js-example-basic-multiple" name="plataforma[]" multiple="multiple">

                <?php
                foreach ($plataformas as $key => $plataforma) {
                  ?>
                  <option style="color: black;" value="<?= $plataforma['id'] ?>">
                    <?= $plataforma['icono'] . $plataforma['nombre'] ?></option>
                  <?php
                }
                ?>

              </select>
            </div>
          </div>
          <div class="container">
            <div class="col-6"><label for="desarrolladores_id">Desarrolladora:</label>
              <select name="desarrolladores_id" class="form-select">
                <option value="0" selected>Otra</option>
                <?php
                foreach ($companies as $key => $company) {
                  ?>
                  <option value="<?= $company['id'] ?>"><?= $company['nombre'] ?></option>
                  <?php
                }
                ?>

              </select>
            </div>
            <div class="col-6"><label for="distribuidora_id">Distribuidora:</label>
              <select name="distribuidora_id" class="form-select">
                <option value="0" selected>Otra</option>
                <?php
                foreach ($companies as $key => $company) {
                  ?>
                  <option value="<?= $company['id'] ?>"><?= $company['nombre'] ?>
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
          <textarea name="sinopsis" class="form-control text-start" id="summernote" rows="10"
            style="width: 100%; text-align: justify; "><?= $Funciones->old('Sinopsis') ?></textarea>
        </div>
      </div>

      <div class="row m-3 justify-content-center">
        <div class="col-6">
          <label for="title" class="form-label">Trailer</label>
          <input type="text" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="trailer" value="<?= $Funciones->old('trailer') ?>" placeholder="WYxvjBsAZog">
          <!-- helper -->
          <div id="titleHelper" class="form-text">Introduce el código del trailer de YouTube. (Ejemplo: WYxvjBsAZog)</div>
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
    $('.js-example-basic-multiple').select2();
  });

  $(document).ready(function () {
    $('#summernote').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
      ]
    });
    $('.form-select').select2();
  });

</script>