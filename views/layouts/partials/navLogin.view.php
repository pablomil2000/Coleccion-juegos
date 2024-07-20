<!-- Games dropdown -->
<li class="nav-item mx-0 my-2 mx-lg-1 dropdown">
	<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		Juegos
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="<?= $GLOBALS['RouteCtrl']->domain ?>games">Todos</a></li>

		<?php
		if ($_SESSION['user']['lvl'] >= 100) {
			?>
			<li><a class="dropdown-item" href="<?= $GLOBALS['RouteCtrl']->domain ?>new/game">Nuevo juego</a></li>
			<?php
		}
		?>
	</ul>
</li>
<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
		href="<?= $GLOBALS['RouteCtrl']->domain ?>companies">Compañias</a>
</li>
<li class="nav-item mx-0 my-2 mx-lg-1 dropdown">
	<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		<?= $_SESSION['user']['nombre'] ?>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="<?= $GLOBALS['RouteCtrl']->domain ?>profile">Perfil</a></li>
		<li><a class="dropdown-item" href="#">Another action</a></li>
		<li>
			<hr class="dropdown-divider">
		</li>
		<li><a class="dropdown-item" href="<?= $GLOBALS['RouteCtrl']->domain ?>logout">Log out</a></li>
	</ul>
</li>