<?php

class userCtrl extends CrudController
{

  public function login($email, $password)
  {
    $data = [
      'column' => 'email',
      'value' => $email
    ];

    $user = $this->getByField($data)[0];

    // var_dump($user);

    if ($user) {
      if ($password === $user['password']) {
        return $user;
      }
    }
    return false;
  }

  public function handlingPassword($password)
  {
    $method = 'sha256';
    $funcionesCtrl = new FunctionCtrl();
    return $funcionesCtrl->encript($password, $method);
  }

}