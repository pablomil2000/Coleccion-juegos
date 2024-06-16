<?php

$FuncionesCtrl = new FunctionCtrl();
$FuncionesCtrl->isLogin();

// var_dump($_GET['page']);
$page = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

$search = '%';
if (isset($_GET['search'])) {
  $search .= $_GET['search'];
}
$search .= '%';



$Funciones = new FunctionCtrl();
$Validate = new ValidateCtrl();

$plataformaCtrl = new plataformaCtrl('plataformas');

$gameCtrl = new gameCtrl('games');
$mygames = new myGamesCtrl('mygames');
$pagination = new paginationCtrl('games', 12, $page, ['titulo' => $search]);
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

// TODO legacy game loader
// $games = $gameCtrl->order(
//   [
//     'column' => 'titulo',
//     'order' => 'ASC'
//   ]
// );

// var_dump($pagination->getLimit());
try {
  $games = $pagination->rawSql('where titulo like"' . $search . '"', 'ORDER BY titulo ASC', $pagination->getLimit());
} catch (\Throwable $th) {
  header('Location: ' . $GLOBALS['RouteCtrl']->domain . '404');
}

// eliminar primer y ultimo caracter
$search = str_replace('%', '', $search);

include_once ('views/partials/games.view.php');