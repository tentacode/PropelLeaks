<?php

require_once(__DIR__ . '/../vendor/uberloader.php');
Uberloader::init(__DIR__.'/..', __DIR__.'/../cache/');
Propel::init(__DIR__.'/../conf/propelleaks-conf.php');