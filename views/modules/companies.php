<?php
$FuncionesCtrl = new FunctionCtrl();
$FuncionesCtrl->isLogin();

$companyCtrl = new companyCtrl('companies');

$companies = $companyCtrl->getAll();



require_once ('./views/partials/companies.view.php');