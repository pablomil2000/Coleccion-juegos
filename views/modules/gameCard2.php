<?php

$Funciones = new FunctionCtrl();
$companyCtrl = new CompanyCtrl('companies');

$game = $gamesCtrl->getByField([
  'column' => 'id',
  'value' => $mygame['game_id']
])[0];

include ('views/partials/gameCard2.view.php');