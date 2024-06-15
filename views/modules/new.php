<?php

$Funciones = new FunctionCtrl();
$Validate = new ValidateCtrl();


$url = explode('/', $_GET['url']);
// var_dump($url);
$catgoria = $url[1];

$plataformaCtrl = new plataformaCtrl('plataformas');
$gameplataformaCtrl = new gameplataformaCtrl('juegos_plataformas');

switch ($catgoria) {
  case 'game':
    $gameCtrl = new gameCtrl('games');
    $companyCtrl = new companyCtrl('companies');

    $plataformas = $plataformaCtrl->getAll();

    $companies = $companyCtrl->getAll();
    // var_dump($_POST);
    // die();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $gameData = [
        'titulo' => $Validate->vltString($_POST['titulo']),
        'Portada' => 'default.jpg',
        'Sinopsis' => $_POST['sinopsis'],
        'Nota' => $Validate->vltNumber($_POST['nota']),
        'salida' => $Validate->vltDate($_POST['salida']),
        'desarrolladores_id' => $_POST['desarrolladores_id'],
        'distribuidora_id' => $_POST['distribuidora_id'],
        'trailer_code' => $_POST['trailer']
      ];


      // var_dump($_POST['titulo']);

      $id = $gameCtrl->create($gameData);


      if ($_POST['plataforma']) {
        foreach ($_POST['plataforma'] as $key => $plataforma) {
          // var_dump($plataforma);
          $gameplataformaData = [
            'juego_id' => $id,
            'plataforma_id' => $plataforma
          ];

          $gameplataformaCtrl->create($gameplataformaData);
        }
      }
      die();


      if ($_FILES['fileUpload']['name']) {

        $res = $Funciones->handleFileUpload($_FILES['fileUpload'], './views/assets/img/games/', '');

        if ($res !== 'Hubo un error moviendo el archivo al directorio de destino.' && $res !== 'No se ha subido ningún archivo o hubo un error en la subida.') {
          $data2['Portada'] = $res;

          $gameCtrl->update($id, $data2);
        } else {
          $error = $res;
        }
      }

      if ($id) {
        header("Location: " . $GLOBALS['RouteCtrl']->domain . "games");
      }
    }

    include_once ('./views/partials/newGame.view.php');
    break;

  case 'company':
    $countryCtrl = new countryCtrl('country');
    $countries = $countryCtrl->getAll();
    $companyCtrl = new companyCtrl('companies');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // var_dump($_POST);
      $companyData = [
        'nombre' => $Validate->vltString($_POST['titulo']),
        'pais_id' => $Validate->vltString($_POST['pais']),
        'historia' => $_POST['historia']
      ];

      $id = $companyCtrl->create($companyData);

      // upload image
      if ($_FILES['fileUpload']['name']) {
        // var_dump($_FILES['fileUpload']);
        $res = $Funciones->handleFileUpload($_FILES['fileUpload'], './views/assets/img/companies/', '');

        if ($res !== 'Hubo un error moviendo el archivo al directorio de destino.' && $res !== 'No se ha subido ningún archivo o hubo un error en la subida.') {
          $data2['logo'] = $res;
          $companyCtrl->update($id, $data2);
        } else {
          $error = $res;
        }
      }

      if ($id) {
        header("Location: " . $GLOBALS['RouteCtrl']->domain . "companies");
      }
    }

    include_once ('./views/partials/newCompany.view.php');
    break;
  default:
    header("Location: " . $GLOBALS['RouteCtrl']->domain . "./404");
    break;
}