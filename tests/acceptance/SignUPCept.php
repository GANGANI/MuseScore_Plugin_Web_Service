<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/src/SignUp.php');
$I->fillField('#username','Ariyarathne');
$I->fillField('#email','ari@gmail.com');
$I->fillField('#password','Ari@1234');
$I->fillField('#repeatPass','Ari@1234');
$I->selectOption('#category','user');
$I->click('#login');