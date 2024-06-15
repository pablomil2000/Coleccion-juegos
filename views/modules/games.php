<?php

$Funciones = new FunctionCtrl();
$Validate = new ValidateCtrl();

$plataformaCtrl = new plataformaCtrl('plataformas');

$gameCtrl = new gameCtrl('games');
$mygames = new myGamesCtrl('mygames');

$Funciones->isLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $game_id = $Validate->vltNumber($_POST['game_id']);
  $plataforma_id = $Validate->vltNumber($_POST['plataforma_id']);
  // $mygames->create()

  $data = [
    'game_id' => $game_id,
    'plataforma_id' => $plataforma_id,
    'player_id' => $_SESSION['user']['id'],
    'date' => date('Y-m-d')
  ];

  $mygames->create($data);
  try {
    echo '  <script>
            Swal.fire({
              title: "Guardado",
              text: "Ya tienes este juego en tu coleccion!",
              icon: "success"
            });
          </script>';
  } catch (\Throwable $th) {
    echo '  <script>
            Swal.fire({
              title: "Error",
              text: "Algo salio mal, ponte en contacto con el administrador del sitio",
              icon: "error"
            });
          </script>';
  }

}

$plataformas = $plataformaCtrl->getAll();

$games = $gameCtrl->order(
  [
    'column' => 'titulo',
    'order' => 'ASC'
  ]
);



include_once ('views/partials/games.view.php');
// var_dump($collections);