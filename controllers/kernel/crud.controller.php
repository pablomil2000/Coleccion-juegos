<?php

class CrudController
{
  private $table;
  private $mode = 'array' || 'object';

  public function __construct($table, $mode = 'array')
  {
    $this->table = $table;
    $this->mode = $mode;
  }

  public function getAll()
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->getAll();
  }

  public function getByField($data)
  {
    // var_dump($data);
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->getByField($data);
  }

  public function getBy($data, $sep = 'and')
  {
    // var_dump($data);
    if ($sep == 'and') {
      $and = true;
    } else {
      $and = false;
    }
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->getBy($data, $and);
  }

  public function getByData($campo, $datos)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->getByData($campo, $datos);
  }

  public function order($data)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->order($data);
  }

  public function update($id, $data)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->update($id, $data);
  }


  public function delete($id)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->delete($id);
  }

  public function create($data)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    return $crudModel->create($data);
  }

  public function updateManyManyArray($data)
  {
    $crudModel = new CrudModel($this->table, $this->mode);
    // comparar los valores del array con los de la tabla, los que sobren se eliminan, los nuevos se insertanw, el resto sin modificaciones

    $crudModel->deleteIn('juego_id', $data['searchValue']);

    $registros = $crudModel->getByField(
      [
        'column' => $data['searchColumn'],
        'value' => $data['searchValue']
      ]
    );

    // Si los datos no existen en la tabla, se insertan
    foreach ($data['manyValue'] as $value) {
      $found = false;
      foreach ($registros as $registro) {
        if ($registro[$data['manyColumn']] == $value) {
          $found = true;
          break;
        }
      }
      if (!$found) {
        $crudModel->create(
          [
            $data['searchColumn'] => $data['searchValue'],
            $data['manyColumn'] => $value
          ]
        );
      }
    }

  }

}