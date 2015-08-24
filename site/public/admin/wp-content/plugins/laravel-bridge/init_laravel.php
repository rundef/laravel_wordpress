<?php
function init_laravel($defaultUri) {
	$dir = __DIR__.'/../../../../';
	require $dir.'bootstrap/autoload.php';

	$app = require_once $dir.'bootstrap/app.php';

	if(isset($_REQUEST['path'])) {
		$path = urldecode($_REQUEST['path']);
		$index = strpos($path, '?');

		$defaultUri = $path;

		if($index !== FALSE) {
			$_SERVER['QUERY_STRING'] = substr($path, 1+$index);
			parse_str($_SERVER['QUERY_STRING'], $variables);

			foreach($variables as $k => $v) {
				$_GET["$k"] = "$v";
			}
		}
	}

	$_SERVER['SCRIPT_FILENAME'] = $app->publicPath().'/index.php';
	$_SERVER['REQUEST_URI'] = $defaultUri;
	$_SERVER['SCRIPT_NAME'] = $_SERVER['PHP_SELF'] = '/index.php';


	$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);



	$response = $kernel->handle(
	    $request = Illuminate\Http\Request::capture()
	);
	$response->send();

	$kernel->terminate($request, $response);
}


function crud_url($type, $uri, $vars = []) {
	$url = 'admin.php?page=' . urlencode('laravel-bridge/crud/'.$type.'.php') . '&path=' . urlencode('/'.$uri);
	foreach($vars as $name => $value) {
		$url .= '&'.$name.'='.urlencode($value);
	}
	return admin_url($url);
}