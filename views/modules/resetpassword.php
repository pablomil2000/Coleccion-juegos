<?php
$error = false;

// var_dump($_GET['url']);

$url = explode('/', $_GET['url']);
$hash = $url[1];

$Funciones = new FunctionCtrl();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  $userCtrl = new UserCtrl('users');

  if ($password === $password2) {

    // var_dump($userCtrl->handlingPassword($password));
    $password = $userCtrl->handlingPassword($password);

    if ($password != false) {
      $user = $userCtrl->getBy(['token' => $hash]);

      if ($userCtrl->update($user[0]['id'], ['password' => $password, 'token' => ''])) {
        $Funciones->rdr('login');
      } else {
        $error = 'No se pudo actualizar la contraseña';
      }
    } else {
      $error = 'No se pudo encriptar la contraseña';
    }
  } else {
    $error = 'Las contraseñas no coinciden';
  }

}

require_once 'views/partials/resetpassword.view.php';
