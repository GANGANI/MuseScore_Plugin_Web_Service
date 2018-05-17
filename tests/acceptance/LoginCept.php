<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/src/Login.php');
$I->see('MuseScore','h2');
$I->see('MuseScore','title');
$I->fillField('username', 'Sominda');
$I->fillField('password','Sominda@123');
//$I->click('Login');
