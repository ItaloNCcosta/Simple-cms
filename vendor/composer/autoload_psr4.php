<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'routes\\' => array($baseDir . '/routes'),
    'Symfony\\Component\\Dotenv\\' => array($vendorDir . '/symfony/dotenv'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'PhpParser\\' => array($vendorDir . '/nikic/php-parser/lib/PhpParser'),
    'Laravel\\SerializableClosure\\' => array($vendorDir . '/laravel/serializable-closure/src'),
    'Invoker\\' => array($vendorDir . '/php-di/invoker/src'),
    'DeepCopy\\' => array($vendorDir . '/myclabs/deep-copy/src/DeepCopy'),
    'DI\\' => array($vendorDir . '/php-di/php-di/src'),
    'App\\' => array($baseDir . '/app'),
);
