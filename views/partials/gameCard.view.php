<!-- Game Item -->
<div class="col-md-6 col-lg-2 mb-5">
  <div class="card-game game-item mx-auto" data-game="<?= $game['id'] ?>" data-bs-toggle="modal"
    data-bs-target="#gameModal">
    <div class="game-item-caption d-flex align-items-center justify-content-center h-100 w-100"
      mdl-image="<?= $game['Portada'] ?>">
      <div class="game-item-caption-content text-center"><?= $game['titulo'] ?></div>
    </div>
    <img class="img-fluid min-vh-10 lazyload"
      src="<?= $Funciones->helperImage($game['Portada'], '/views/assets/img/games/' . $game['Portada']) ?>" alt="..." />
  </div>
</div>

<script>
  saveGame(<?= json_encode($game) ?>);
  savePlatformsGames(<?= $game['id'] ?>, <?= json_encode($plataformas) ?>);
</script>