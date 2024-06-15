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
            name="titulo" value="<?= $company['nombre'] ?>">
        </div>
      </div>

      <div class="col-12 row m-3 justify-content-center">
        <div class="col-4">
          <label for="title" class="form-label">Portada</label>
          <div class="container m-3">
            <img class="img-fluid rounded mb-5 min-vh-10"
              src="<?= $Funciones->helperImage($company['logo'], '/views/assets/img/companies/' . $company['logo']) ?>"
              alt="" id="preview">
          </div>
          <input type="file" class="form-control" id="title" aria-describedby="titleHelper" style="width: 100%;"
            name="fileUpload" onchange="readURL(this)">
        </div>
      </div>

      <div class="row m-3 justify-content-center">
        <div class="col-6">
          <label for="title" class="form-label">Historia</label>
          <textarea name="historia" class="form-control text-start" id="summernote" rows="10"
            style="width: 100%; text-align: justify; "><?= $company['historia'] ?></textarea>
        </div>
      </div>

      <!-- Pais -->
      <div class="col-12 row m-3 justify-content-center">
        <div class="col-6">
          <label for="pais" class="form-label">Pais</label>
          <select class="form-select" name="pais">
            <option value="0">Selecciona un pais</option>
            <?php
            foreach ($countries as $country) {
              ?>
              <option value="<?= $country['id'] ?>" <?= $country['id'] == $company['pais_id'] ? 'selected' : '' ?>>
                <?= $country['name'] ?>
              </option>
              <?php
            }
            ?>
          </select>
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
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function () {
    $('.form-select').select2();
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