<?php
require_once "vendor/autoload.php";

/** @var \King23\DI\DependencyInjector $container */
$container = require_once "config/services.php";

/** @var \Knight23\Core\Knight23 $knight23 */
$knight23 = $container->getInstanceOf(\Knight23\Core\Knight23::class);

$knight23->run();
