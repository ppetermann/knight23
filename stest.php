<?php
require_once "vendor/autoload.php";

/** @var \King23\DI\DependencyContainer $container */
$container = require_once "config/services.php";

/** @var \Knight23\Core\Knight23 $knight23 */
$knight23 = $container->getInstanceOf(\Knight23\Core\RunnerInterface::class);

// add commands
// @todo move default commands to constructor
$knight23->addCommand(\Knight23\Core\Command\ListCommands::class);

$knight23->run();
