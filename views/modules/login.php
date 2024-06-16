<?php

$Funciones = new FunctionCtrl();
$Validate = new ValidateCtrl();
$userCtrl = new userCtrl('users');

$Funciones->isGuest();

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $Validate->vltEmail($_POST['email']);
  $password = $userCtrl->handlingPassword($_POST['password']);
  $preuser = $userCtrl->getBy(['email' => $email])[0];
  // $password = $_POST['password'];

  if ($email != '' && $password != '') {

    $user = $userCtrl->login($email, $password);
    // var_dump($preuser);
    if ($preuser['token'] == '') {
      if ($user) {
        $userCtrl->update($user['id'], ['lastLogin' => date('Y-m-d H:i:s')]);
        $_SESSION['user'] = $user;
        header('Location: ./');
      } else {
        $error = 'Usuario o contraseña incorrectos';
      }
    } else {
      header('Location: ./resetpassword/' . $preuser['token'] . '/');
    }



  } else {
    $error = 'Recuerda llenar todos los campos correctamente';
  }



}

include_once ('views/partials/login.view.php');