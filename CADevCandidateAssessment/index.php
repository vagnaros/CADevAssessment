<?php

/** Required External Files */
require dirname(__FILE__).'/Base/CABlock.php';
require dirname(__FILE__).'/Base/CAController.php';
require dirname(__FILE__).'/Base/function.php';

spl_autoload_register( function ($className) { //Create Autoload Function (multiple)
    $className = ltrim($className, '\\'); //Remove '\\' from classname
    $fileName  = ''; //Set Filename Empty
    $namespace = ''; //Set Namespace Empty
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fileName = str_replace("CADev", dirname(__FILE__), $fileName);
    require $fileName;
});

$uri = $_GET['LOCATION']; //Set Uri to HTTP GET Request (passed Location Text)
if (!isset($uri) || empty($uri) || $uri == ''){ //Check if not Empty
    $uri = '/'; //Set URI to Root Char
}

$uri_map = [ //Create Array for Dir Mapping
    '/' => 'core.indexmember', 'report' => 'report.display'
];

if (array_key_exists($uri, $uri_map)){
    echo \CADev\Base\GetController($uri_map[$uri]);
}
else {
    http_response_code(404);
    echo "Error 404: Page not found";
}

?>