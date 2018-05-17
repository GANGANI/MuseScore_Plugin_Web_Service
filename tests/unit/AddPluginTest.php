<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 5/14/18
 * Time: 9:56 PM
 */


class AddPluginTest extends PHPUnit_Framework_TestCase
{
    public function testTitle()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['Title'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('Brass_Fingering',$row['Title']);
    }

    public function testCategory()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['category'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('Brass instruments',$row['category']);
    }

    public function testAPICompatibility()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['version'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('2.x',$row['version']);
    }

    public function testAuthor()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['author'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('jojo',$row['author']);
    }

    public function testPlugin()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['plugin'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('https://musescore.org/sites/musescore.org/files/brass_fingering.qml',$row['plugin']);
    }

    public function testTitleValidity()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['Title'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('BrassFingering',$row['Title']);
    }

    public function testCategoryValidity()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['category'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('Brassinstruments',$row['category']);
    }

    public function testAPICompatibilityValidity()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['version'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('2x',$row['version']);
    }

    public function testAuthorValidity()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['author'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('jojooo',$row['author']);
    }

    public function testPluginValidity ()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['plugin'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('https://musescore.org/sites/musescore.org/files/brass_fingering.qmmmmml',$row['plugin']);
    }

}
