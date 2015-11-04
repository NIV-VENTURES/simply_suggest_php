<?php

require "init.php";

\SimplySuggest\SimplySuggest::getInstance()->setPrivateKey("secret-2")->setPublicKey("public-2");

$user    = new \SimplySuggest\User("f74882bf-8ee5-4807-a1da-604adc1ee362");
$objects = $user->loadRecommendations();

var_dump($objects);

$user    = new \SimplySuggest\Object(501, "series");
$objects = $user->loadRecommendations();

var_dump($objects);