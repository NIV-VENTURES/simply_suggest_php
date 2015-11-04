<?php

require "init.php";

$ss = \SimplySuggest\SimplySuggest::getInstance();
$ss->setPrivateKey("secret-2")->setPublicKey("public-2");

$user = new \SimplySuggest\User("f74882bf-8ee5-4807-a1da-604adc1ee362");
$recs = $user->loadRecommendations();

var_dump($recs);

$user = new \SimplySuggest\Object(501, "series");
$recs = $user->loadRecommendations();

var_dump($recs);