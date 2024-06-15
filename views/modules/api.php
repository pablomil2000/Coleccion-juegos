<?php
$url = explode("/", $_GET['url']);


switch ($url[1]) {
  case 'updategames':

    include ('./views/modules/api/updategames.php');

    break;

  default:
    # code...
    break;
}