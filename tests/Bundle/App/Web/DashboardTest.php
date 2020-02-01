<?php

namespace Tests\Bundle\User\Web;

use PhpLab\Sandbox\Web\Enums\HttpStatusCodeEnum;
use PhpLab\Test\BaseRestTest;

class DashboardTest extends BaseRestTest
{

    protected $basePath = '';

    public function testMainPage()
    {
        $response = $this->sendGet('');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, '<a href="/article">Show all</a>');
    }

    public function testLoginPage()
    {
        $response = $this->sendGet('login');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, 'Log in');
    }

    public function testRegisterPage()
    {
        $response = $this->sendGet('register');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, 'Register');
    }

    public function testResettingRequestPage()
    {
        $response = $this->sendGet('resetting/request');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, 'Resetting');
    }

    public function testArticlePage()
    {
        $response = $this->sendGet('article');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, '/article/create');
    }

    public function testAdminPageNoAuth()
    {
        $response = $this->sendGet('/admin');

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertSubsetText($response, 'Log in');
    }

}
