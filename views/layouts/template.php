<?php
require_once ('./views/layouts/modules/head.php');
?>

<body>
  <?php
  require_once ('./views/layouts/modules/header.php');
  ?>

  <?php

  $RouteCtrl = new RouteCtrl();
  $RouteCtrl->whitelist(
    'home',
    'login',
    'logout',
    'games',
    'companies',
    'edit',
    'new',
    'profile',
    'collections',
    'api',
    'resetpassword'
  );

  ?>

  <?php
  require_once ('./views/layouts/modules/footer.php');
  ?>


</body>

</html>