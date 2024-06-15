<?php

class companyCtrl extends CrudController
{
  private gameCtrl $gameCtrl;

  public function __construct($table, $mode = 'array')
  {
    parent::__construct($table, $mode = 'array');

    $this->gameCtrl = new gameCtrl('games');
  }

  public function notaMedia($company_id = null)
  {
    $juegos = $this->gameCtrl->getBy(['desarrolladores_id' => $company_id, 'distribuidora_id' => $company_id], 'OR');
    $cont = 0;
    $acum = 0;

    foreach ($juegos as $key => $value) {
      // var_dump($value);
      if ($value['Nota'] != 0) {
        $cont++;
        $acum += $value['Nota'];
      }
    }

    // var_dump($cont, $acum);

    return $cont == 0 ? 'No hay notas' : round($acum / $cont);
  }

}