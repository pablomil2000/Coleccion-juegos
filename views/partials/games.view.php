<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
  <!-- login form -->
  <div class="container d-flex align-items-center flex-column">
    <!-- Games Section-->
    <section class="page-section game" id="game">
      <div class="container">
        <!-- Games Section Heading-->
        <h2 class="page-section-heading text-uppercase text-secondary">Juegos</h2>
        <!-- button new game -->
        <?php

        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == '2') {
          ?>
          <a class="btn btn-primary btn-xs" href="<?= $GLOBALS['RouteCtrl']->domain ?>new/game">Nuevo Juego</a>
          <?php
        }
        ?>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fa-solid fa-gamepad"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Games Grid Items-->
        <div class="card-container row justify-content-center">
          <?php
          foreach ($games as $game) {
            // var_dump($game);
            include ('views/modules/gameCard.php');
          }
          ?>
        </div>
      </div>
    </section>
  </div>
</header>

<script>
  // sort by data-nota
  var $divs = $("div.card-game");
  var ordered = $divs.sort(function (a, b) {
    return $(a).data("nota") - $(b).data("nota")
  });

  function saveCollection (select, gameId) {

    var collectionId = select.value;
    var data = {
      collection_id: collectionId,
      game_id: gameId
    };

    $.ajax({
      type: "POST",
      url: "<?= $GLOBALS['RouteCtrl']->domain ?>api/updatecollection",
      data: data,
      success: function (response) {
        console.log(response);
      }
    });

  }

  // Justificar texto
  document.querySelectorAll('.text-justify').forEach((element) => {
    element.style.textAlign = 'justify';

    element.childNodes.forEach((child) => {
      if (child.nodeType === 3) {
        child.nodeValue = child.nodeValue.trim();
      }
    });

  });
</script>