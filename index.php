<?php
session_start();

//  --  Controllers
require_once ("./controllers/kernel/template.controller.php");      //* Template load controller
require_once ("./controllers/kernel/route.controller.php");         //* Route controller
require_once ("./controllers/kernel/crud.controller.php");          //* CRUD controller
require_once ("./controllers/kernel/function.controller.php");      //* Function controller
require_once ("./controllers/kernel/validate.controller.php");      //* Validate controller
require_once ("./controllers/kernel/pagination.controller.php");    //* Pagination controller


require_once ("./controllers/user.controller.php");
require_once ("./controllers/country.controller.php");
require_once ("./controllers/game.controller.php");
require_once ("./controllers/plataforma.controller.php");
require_once ("./controllers/gameplataforma.controller.php");
require_once ("./controllers/company.controller.php");
require_once ("./controllers/mygames.controller.php");
require_once ("./controllers/rol.controller.php");


//  --  Modules
require_once ("./models/conexion.model.php"); //* Connection to the data origin
require_once ("./models/crud.model.php"); //* CRUD model


//  --  Load template
$tempalteCtrl = new TemplateController('./views/layouts/', 'template');
$GLOBALS['RouteCtrl'] = new RouteCtrl();

$tempalteCtrl->load();