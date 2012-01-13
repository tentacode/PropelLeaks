<?php

require_once(__DIR__ . '/../lib/bootstrap.php');

//reset
AdressPeer::doDeleteAll();
PersonPeer::doDeleteAll();

Propel::disableInstancePooling();

for($i = 0; $i <= 10000; $i++)
{
  $adress = new Adress();
  $adress->setPostCode('01630');
  $adress->setCity("Saint Genis-Pouilly");

  $person = new Person();
  $person->setName("Mr Foobar");
  $person->setEmail("foo@bar.com");
  $person->addAdress($adress);
  $person->save();

  // Uncomment this next line to fix leaks
  //$person->clearAllReferences(true);

  if($i % 1000 == 0)
  {
    Debug::printMemoryUsage($i. " iterations");
  }
}