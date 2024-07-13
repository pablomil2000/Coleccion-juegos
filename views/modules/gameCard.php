<?php

$Funciones = new FunctionCtrl();
$companyCtrl = new CompanyCtrl('companies');
$mygamesCtrl = new UserCtrl('mygames');

$gamePlataformaCtrl = new gamePlataformaCtrl('juegos_plataformas');
$plataformasCtrl = new plataformaCtrl('plataformas');

$paltaformasJuegos = $gamePlataformaCtrl->getByData('juego_id', $game['id']);

$plataformas = [];
foreach ($paltaformasJuegos as $plataforma) {
  $plataformas[] = $plataformasCtrl->getByData('id', $plataforma['plataforma_id'])[0];


}

// var_dump($plataformas);

// die();

// var_dump($plataformas);
include ('views/partials/gameCard.view.php');