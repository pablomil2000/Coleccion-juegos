<?php

class paginationCtrl extends CrudController
{
  // protected $tabla;
  private $porPag;
  private $page;
  private $numPages;
  private $numProductos;

  /**
   * Class constructor for the PaginationController.
   *
   * @param string $tabla The table name.
   * @param int $porPag The number of items per page.
   * @param int $page The current page number.
   * @param array $datos The data array.
   */
  public function __construct($tabla, $porPag, $page, $datos = array())
  {
    parent::__construct($tabla);

    $this->porPag = $porPag;
    $this->page = $page;


    $this->numProductos = count($this->getBy($datos));

    $this->numPages = (int) ceil(intval($this->numProductos) / intval($this->porPag));
    $this->page = $this->vlt_Page($page);
  }


  /**
   * Validates the given page number and returns a valid page number.
   *
   * @param int $page The page number to validate.
   * @return int The validated page number.
   */
  private function vlt_Page($page)
  {
    if ($page < 0) {
      $page = 0;
    } elseif ($page >= $this->numPages) {
      $page = $this->numPages - 1;
    }
    // var_dump($page);

    return $page;
  }

  /**
   * Returns the limit clause for pagination.
   *
   * @return string The limit clause for pagination.
   */
  public function getLimit()
  {
    $productoInicio = $this->page * $this->porPag;
    // var_dump($this->page);
    $limit = " limit $productoInicio, $this->porPag ";
    return $limit;
  }

  /**
   * Magic method to get the value of a property dynamically.
   *
   * @param string $name The name of the property to get.
   * @return mixed The value of the property.
   */
  public function __get($name)
  {
    return $this->$name;
  }

  /**
   * Returns the previous page number.
   *
   * @return int The previous page number.
   */
  public function previus()
  {
    if ($this->page == 0) {
      return 1;
    }

    return $this->page;
  }

  /**
   * Calculates the next page number based on the current page and the total number of pages.
   *
   * @return int The next page number.
   */
  public function next()
  {
    if ($this->page + 2 > $this->numPages) {
      return $this->page + 1;
    }

    return $this->page + 2;
  }

  /**
   * Returns the pagination links.
   *
   * @return string The pagination links.
   */
  public function getPagination()
  {
    $html = '';
    $html .= '<li class="page-item"><a class="page-link" href="?page=' . $this->previus() . '">Previous</a></li>';
    for ($i = 0; $i < $this->numPages; $i++) {
      $html .= '<li class="page-item"><a class="page-link" href="?page=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
    }
    $html .= '<li class="page-item"><a class="page-link" href="?page=' . $this->next() . '">Next</a></li>';
    return $html;
  }
}