<?php

use Configuration\Loader;
use Neoan\NeoanApp;

$root = dirname(__DIR__);

require_once $root . '/vendor/autoload.php';

$setup = (new \Neoan\Helper\Setup())->setPublicPath(__DIR__)->setLibraryPath($root . '/src');


$app = new NeoanApp($setup , $root);
$app->invoke(new Loader());
$app->run();