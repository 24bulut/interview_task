<?php

require './vendor/autoload.php';

$app = new \User\JobCase\Core\Bootstrap();
$app->handleRoute();
