<?php

$Funciones = new FunctionCtrl();
$userCtrl = new UserCtrl('users');
$mygamesCtrl = new UserCtrl('mygames');
$plataformaCtrl = new plataformaCtrl('plataformas');
$gamesCtrl = new UserCtrl('games');
$Funciones->isLogin();

$url = explode('/', $_GET['url']);
if (isset($url[1])) {
  $id = $url[1];
} else {
  $id = $_SESSION['user']['id'];
}

// var_dump($id);

$user = $userCtrl->getByField([
  'column' => 'id',
  'value' => $id
]);

$mygames = $mygamesCtrl->getByField([
  'column' => 'player_id',
  'value' => $id
]);

// var_dump($user);

if ($user) {
  $user = $user[0];
} else {
  $Funciones->rdr('404');
}

// var_dump($user);

require_once 'views/partials/profile.view.php';