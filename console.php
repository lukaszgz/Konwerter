#!/usr/bin/env php
<?php

require __DIR__.'\vendor\autoload.php';

use Symfony\Component\Console\Application;
use Console\ScaleCommand;

$application = new Application();

$application->add(new ScaleCommand());
$application->run();

