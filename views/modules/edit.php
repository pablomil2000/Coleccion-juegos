<?php

$Funciones = new FunctionCtrl();
$url = explode('/', $_GET['url']);
// var_dump($url);
$catgoria = $url[1];
$id = $url[2];

$plataformaCtrl = new plataformaCtrl('plataformas');
$gameplataformaCtrl = new gameplataformaCtrl('juegos_plataformas');
$companyCtrl = new companyCtrl('companies');


switch ($catgoria) {
  case 'game':
    $gameCtrl = new gameCtrl('games');
    $plataformas = $plataformaCtrl->getAll();
    $companies = $companyCtrl->getAll();

    // var_dump($plataformasGame);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'titulo' => $_POST['titulo'],
        'Sinopsis' => $_POST['sinopsis'],
        'Nota' => $_POST['nota'],
        'salida' => $_POST['salida'],
        'trailer_code' => $_POST['trailer'],
        'distribuidora_id' => $_POST['distribuidora_id'],
        'desarrolladores_id' => $_POST['desarrolladores_id']
      ];
      $game = $gameCtrl->getByField(
        [
          'column' => 'id',
          'value' => $id
        ]
      )[0];


      if ($_FILES['fileUpload']['name']) {

        $res = $Funciones->handleFileUpload($_FILES['fileUpload'], './views/assets/img/games/', $game['Portada']);

        if ($res !== 'Hubo un error moviendo el archivo al directorio de destino.' && $res !== 'No se ha subido ningún archivo o hubo un error en la subida.') {
          $data['Portada'] = $res;
        } else {
          $error = $res;
        }
      }

      if (!isset($error)) {
        if ($gameCtrl->update($id, $data)) {
          $ready = 'Cambios guardados';
        }
      }

      $data2 = [
        'manyColumn' => 'plataforma_id',
        'manyValue' => isset($_POST['plataforma']) ? $_POST['plataforma'] : [],
        'searchColumn' => 'juego_id',
        'searchValue' => $id
      ];

      // Codigo para actualizar la tabla de muchos a muchos
      $gameplataformaCtrl->updateManyManyArray($data2);
    }


    $game = $gameCtrl->getByField(
      [
        'column' => 'id',
        'value' => $id
      ]
    )[0];

    $plataformasGame = $gameplataformaCtrl->getByField(
      [
        'column' => 'juego_id',
        'value' => $id
      ]
    );
    if (!$game) {
      header("Location: " . $GLOBALS['RouteCtrl']->domain . "./404");
    }

    include_once ('./views/partials/editGame.view.php');
    break;

  case 'company':

    $countryCtrl = new countryCtrl('country');

    $countries = $countryCtrl->getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'nombre' => $_POST['titulo'],
        'historia' => $_POST['historia'],
        'pais_id' => $_POST['pais']
      ];
      $company = $companyCtrl->getByField(
        [
          'column' => 'id',
          'value' => $id
        ]
      )[0];

      if ($_FILES['fileUpload']['name']) {

        $res = $Funciones->handleFileUpload($_FILES['fileUpload'], './views/assets/img/companies/', $company['logo']);

        if ($res !== 'Hubo un error moviendo el archivo al directorio de destino.' && $res !== 'No se ha subido ningún archivo o hubo un error en la subida.') {
          $data['logo'] = $res;
        } else {
          $error = $res;
        }
      }

      if (!isset($error)) {
        if ($companyCtrl->update($id, $data)) {
          $ready = 'Cambios guardados';
        }
      }
    }

    $company = $companyCtrl->getByField(
      [
        'column' => 'id',
        'value' => $id
      ]
    )[0];

    if (!$company) {
      header("Location: " . $GLOBALS['RouteCtrl']->domain . "./404");
    }

    include_once ('./views/partials/editCompany.view.php');
    break;

  default:
    header("Location: " . $GLOBALS['RouteCtrl']->domain . "./404");
    break;
}