<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 5/15/18
 * Time: 8:41 PM
 */


class updatePluginTest extends PHPUnit_Framework_TestCase
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
}
