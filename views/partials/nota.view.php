<?php


$nota = $game['Nota'];

if ($nota < 30) {
  $nota = 'danger';
} elseif ($nota < 50) {
  $nota = 'danger';
} elseif ($nota < 60) {
  $nota = 'warning';
} elseif ($nota < 90) {
  $nota = 'primary';
} else {
  $nota = 'success';
}

?>
<div class="col-2 p-2 bg-<?= $nota ?> rounded" style="min-width: fit-content;">
  <h4 class="text-secondary">Nota</h4>
  <h5 class="text-secondary"><?= $game['Nota'] ?></h5>
</div>