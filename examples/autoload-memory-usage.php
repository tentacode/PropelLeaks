<?php

require_once(__DIR__ . '/../lib/bootstrap.php');

Propel::disableInstancePooling();

Debug::printMemoryUsage("Before autoloading");
$personQuery = PersonQuery::create();
Debug::printMemoryUsage("PersonQuery::create");
$adressQuery = AdressQuery::create();
Debug::printMemoryUsage("AdressQuery::create");