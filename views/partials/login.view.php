<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <!-- login form -->
  <form action="" method="post">
    <div class="container d-flex align-items-center flex-column">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control " id="email" name="email" value="<?= $Funciones->old('email') ?>">
      </div>
      <div class="form-group mt-3">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
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