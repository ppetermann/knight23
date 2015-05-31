<?php
$container = new \King23\DI\DependencyInjector();

// the output writer
$container->register(
    \Knight23\Core\Output\WriterInterface::class,
    function () {
        return new \Knight23\Core\Output\SimpleTextWriter();
    }
);


// the react event loop - this uses the factory by default - which should allow it to run on most
// php enabled systems
$container->register(
    \React\EventLoop\LoopInterface::class,
    function () {
        return \React\EventLoop\Factory::create();
    }
);

return $container;
