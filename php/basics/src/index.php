<?php

use Cowsayphp\Farm;
use Cowsayphp\Farm\cow;
use Cowsayphp\Farm\Tux;
use Cowsayphp\Farm\Whale;

require_once "../vendor/autoload.php";

$cow = Farm::create(Cow::class);
echo "<pre>" . $cow->say("Ohmg I'm a cow!") . "</pre>";

$tux = Farm::create(Tux::class);
echo "<pre>" . $tux->say("Linux!") . "</pre>";

$whale = Farm::create(Whale::class);
echo "<pre>" . $whale->say("Whale!") . "</pre>";