<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);

define('ONLY_CHARATER', "/^[a-záéíóúÁÉÍÓÚüÜñÑ ]+$/i");

// Access to DB
require_once 'configDB.php';

require_once 'Config/Autoload.php';


Config\Autoload::run();
Config\Enrutador::run(new Config\Request());