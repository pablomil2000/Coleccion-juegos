<?php

$Funciones = new FunctionCtrl();
$userCtrl = new UserCtrl('users');
$mygamesCtrl = new UserCtrl('mygames');
$plataformaCtrl = new plataformaCtrl('plataformas');
$gamesCtrl = new gameCtrl('games');
$rolesCtrl = new UserCtrl('rols');

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

$role = $rolesCtrl->getByField([
  'column' => 'id',
  'value' => $user[0]['rol_id']
]);

$mygames = $mygamesCtrl->getByField([
  'column' => 'player_id',
  'value' => $id
]);

// $mygames = $mygamesCtrl->raw("SELECT * FROM mygames WHERE player_id = $id GROUP BY game_id");


// var_dump($user);

if ($user) {
  $user = $user[0];
} else {
  $Funciones->rdr('404');
}

// var_dump($user);

require_once 'views/partials/profile.view.php';