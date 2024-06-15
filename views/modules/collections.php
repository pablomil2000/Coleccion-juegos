<?php

$url = explode('/', $_GET['url']);
$id = $url[1];
// var_dump($id);

$collectionCtrl = new CollectionCtrl('collections');
$Funciones = new FunctionCtrl();
$collectionGameCtrl = new collectionGameCtrl('collection_game');

$gameCtrl = new gameCtrl('games');

$collection = $collectionCtrl->getBy(['id' => $id])[0];
$games = $collectionGameCtrl->getBy(['collection_id' => $id]);

if (empty($collection)) {
  $Funciones->rdr('404');
}

require_once ('./views/partials/collections.view.php');
// var_dump($games);

