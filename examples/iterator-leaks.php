<?php

require_once(__DIR__ . '/../lib/bootstrap.php');

//reset
AdressPeer::doDeleteAll();
PersonPeer::doDeleteAll();

Propel::disableInstancePooling();

for($i = 0; $i <= 10000; $i++)
{
  $person = new Person();
  $person->setName("Mr Foobar");
  $person->setEmail(sprintf("foo%s@bar.com", $i%100));

  $personWithSameMail = PersonQuery::create()
    ->filterByEmail($person->getEmail())
    ->find();
  ;

  $asArray = $personWithSameMail->toArray();

  // Uncomment this next line to fix leaks
  //$personWithSameMail->clearIterator();

  if($personWithSameMail == null)
  {
    $person->save();
  }

  if($i % 1000 == 0)
  {
    Debug::printMemoryUsage($i. " iterations");
  }
}