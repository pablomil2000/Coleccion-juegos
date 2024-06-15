<?php

$Funciones = new FunctionCtrl();
$companyCtrl = new CompanyCtrl('companies');

$gamePlataformaCtrl = new gamePlataformaCtrl('juegos_plataformas');
$plataformasCtrl = new plataformaCtrl('plataformas');

// $plataformas = $plataformasCtrl->getByData('juego_id', $gamePlataformaCtrl->getByField(['column' => 'juego_id', 'value' => $game['id']])[0]['plataforma_id']);

// var_dump($plataformas);
include ('views/partials/gameCard.view.php');