<?php

require(__DIR__ . '/framework/Framework.php');

use framework\Application;

spl_autoload_register(['Framework', 'autoload'], true, true);

$config = require(__DIR__ . '/config.php');
$application = new Application($config);
$application->run();