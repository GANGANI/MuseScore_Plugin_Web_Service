<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/src/Add_plugins.php');
$I->fillField('#name','Brass_Fingering');
$I->fillField('#name2','Brass instruments');
$I->fillField('#name3','jojo');
$I->fillField('#url','https://musescore.org/sites/musescore.org/files/brass_fingering.qml');
$I->selectOption('#category','1.x');
$I->click('#submit');