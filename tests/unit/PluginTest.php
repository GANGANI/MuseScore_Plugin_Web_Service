<?php


class PluginTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
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

    public function testPluginDetails()
    {
        $user = new \App\plugin();
        $result = $user->getPluginDetails(['category','version','author','plugin'],'Brass_Fingering');
        $row = $result->fetch_assoc();
        $this->assertEquals('https://musescore.org/sites/musescore.org/files/brass_fingering.qml',$row['plugin']);
        $this->assertEquals('Brass instruments',$row['category']);
        $this->assertEquals('2.x',$row['version']);
        $this->assertEquals('jojo',$row['author']);

    }

    public function testDownloadPluginDetails()
    {
        $user = new \App\plugin();
        $result = $user->getDownloadedPluginDetails(['category','version','author'],'Sominda');
        $row = $result->fetch_assoc();
        $this->assertEquals('Brass instruments',$row['category']);
        $this->assertEquals('2.x',$row['version']);
        $this->assertEquals('jojo',$row['author']);

    }

}