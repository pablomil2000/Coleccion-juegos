<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">



  <!-- login form -->
  <form action="" method="post">
    <div class="container d-flex align-items-center flex-column">
      <div class="form-group">
        <input type="hidden" value="<?= $hash ?>">
        <label for="email">Contraeña:</label>
        <input type="password" class="form-control " name="password">
      </div>
      <div class="form-group mt-3">
        <label for="password">Confirmar contraseña:</label>
        <input type="password" class="form-control" name="password2">
      </div>

      <?php
      if ($error) {
        ?>
        <div class="alert alert-danger mt-3" role="alert">
          <?= $error ?>
        </div>
        <?php
      }
      ?>

      <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </div>
  </form>

</header>