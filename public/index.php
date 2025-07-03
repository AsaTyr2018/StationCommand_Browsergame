<?php
require __DIR__ . '/../vendor/autoload.php';

use StationCommand\Core\Kernel;
use StationCommand\Modules\ExampleModule\ExampleAgent;

$kernel = new Kernel();
$kernel->registerAgent(new ExampleAgent());

$kernel->runTick();
