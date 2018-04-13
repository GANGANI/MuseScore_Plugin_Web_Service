<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/11/18
 * Time: 8:27 PM
 */

class Test extends \Codeception\Test\Unit
{
    protected $tester;

    public function testBehaviour(){

        $this -> tester ->amOnPage('Login.php');
        $this -> tester -> see('PhpStrom & Codeception');
    }
}
