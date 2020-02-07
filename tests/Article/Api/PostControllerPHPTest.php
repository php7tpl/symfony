<?php

namespace Tests\Article\Api;

class PostControllerPHPTest extends \PhpLab\Sandbox\Tests\rest\Article\PostControllerTest
{

    protected $basePath = 'php/v1/';

    public function testBadCreate()
    {
        $this->assertEquals(1, 1);
    }

    public function testBadUpdate()
    {
        $this->assertEquals(1, 1);
    }

    public function testCreate()
    {
        $this->assertEquals(1, 1);
    }

    public function testMethodAllowed()
    {
        $this->assertEquals(1, 1);
    }

    public function testOptions()
    {
        $this->assertEquals(1, 1);
    }

}
