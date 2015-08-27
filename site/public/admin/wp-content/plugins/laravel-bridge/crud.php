<?php
require_once __DIR__.'/init-laravel.php';

if(isset($_REQUEST['object'])) {
	init_laravel('/cms/' . $_REQUEST['object']);
}
