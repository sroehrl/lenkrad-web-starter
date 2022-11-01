<?php

use Configuration\Loader;
use Neoan\NeoanApp;

$root = dirname(__DIR__);

require_once $root . '/vendor/autoload.php';

$app = new NeoanApp($root . '/src', __DIR__ , $root);
$app->invoke(new Loader());
$app->run();