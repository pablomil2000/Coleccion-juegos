<!-- Game Item -->
<div class="col-md-6 col-lg-2 mb-5" data-nota="<?= $game['Nota'] ?>">
  <div class="card-game game-item mx-auto">
    <div class="game-item-caption d-flex align-items-center justify-content-center h-100 w-100">
      <div class="game-item-caption-content text-center"><?= $game['titulo'] ?></div>
    </div>
    <img class="img-fluid min-vh-10" loading="lazy"
      src="<?= $Funciones->helperImage($game['Portada'], '/views/assets/img/games/' . $game['Portada']) ?>" alt="..." />
  </div>
</div>