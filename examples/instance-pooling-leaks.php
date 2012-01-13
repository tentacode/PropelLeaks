<?php

require_once(__DIR__ . '/../lib/bootstrap.php');

//reset
AdressPeer::doDeleteAll();
PersonPeer::doDeleteAll();

// Uncomment this next line to fix leaks
//Propel::disableInstancePooling();

for($i = 0; $i <= 10000; $i++)
{
  $person = new Person();
  $person->setName("Mr Foobar");
  $person->setEmail("foo@bar.com");
  $person->save();

  if($i % 1000 == 0)
  {
    Debug::printMemoryUsage($i. " iterations");
  }
}