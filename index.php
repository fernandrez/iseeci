<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.16.bca042/framework/yii.php';
$configMain = require(dirname(__FILE__) . '/protected/config/main.php');
// config file to be changed without commiting to SVN
$configLocal = require(dirname(__FILE__) . '/protected/config/local.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$config = CMap::mergeArray($configMain, $configLocal);
Yii::createWebApplication($config)->run();
