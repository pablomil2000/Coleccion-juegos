<?php

$Funciones = new FunctionCtrl();
$Validate = new ValidateCtrl();

$Funciones->isGuest();

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $Validate->vltEmail($_POST['email']);
  $password = $_POST['password'];

  if ($email != '' && $password != '') {

    $userCtrl = new userCtrl('users');
    $user = $userCtrl->login($email, $password);

    if ($user['token'] === '') {
      if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ./');
      } else {
        $error = 'Usuario o contraseña incorrectos';
      }
    } else {
      header('Location: ./resetpassword');
    }



  } else {
    $error = 'Recuerda llenar todos los campos correctamente';
  }



}

include_once ('views/partials/login.view.php');