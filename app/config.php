<?php

namespace PHPMVC\APP;


defined('DB_HOST_NAME')       ? null : define ('DB_HOST_NAME', 'localhost');
defined('DB_USER_NAME')       ? null : define ('DB_USER_NAME', 'root');
defined('DB_PASSWORD')        ? null : define ('DB_PASSWORD', '');
defined('DB_NAME')            ? null : define ('DB_NAME', 'playground');
defined('DB_PORT_NUMBER')     ? null : define ('DB_PORT_NUMBER', 3306);


define("URLROOT","http://playground.com/");
define("SITENAME","playground") ;
define("DS", DIRECTORY_SEPARATOR);
define("APP_PATH",realpath(dirname(__FILE__)));
define("VIEW_PATH" , realpath(dirname(__FILE__).DS."view"));
define("LIB_PATH" , realpath(dirname(__FILE__).DS."lib"));
define("INCLUDES_USER_PATH" , realpath(dirname(__FILE__).DS."view".DS."Users".DS."includes").DS);
define("INCLUDES_ADMIN_PATH" , realpath(dirname(__FILE__).DS."view".DS."AdminDashboard".DS."includes"));
define("INCLUDES_PATH" , realpath(dirname(__FILE__).DS."view".DS."includes"));
define("USER_PHOTOS_PATH_UPLOAD" , "UserAssets\img\clients\\");
define("USER_PHOTOS_PATH_SHOW" , "\UserAssets\img\clients\\");
define("PITCHES_PHOTOS_PATH_UPLOAD" , "AdminAssets\img\pitches\\");
define("PITCHES_PHOTOS_PATH_SHOW" , "\AdminAssets\img\pitches\\");
define("ADMIN_PHOTOS_PATH_UPLOAD" , "AdminAssets\img\clients\\");
define("ADMIN_PHOTOS_PATH_SHOW" , "\AdminAssets\img\clients\\");
define("STATIC_IMAGE" , "user.png");