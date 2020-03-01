<?php

namespace Tests\User\Web;

use PhpLab\Core\Enums\Http\HttpStatusCodeEnum;
use PhpLab\Test\Base\BaseRestWebTest;

class DashboardTest extends BaseRestWebTest
{

    protected $basePath = '';

    public function testMainPage()
    {
        $response = $this->getRestClient()->sendGet('');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('<a href="/article">Show all</a>');
    }

    public function testLoginPage()
    {
        $response = $this->getRestClient()->sendGet('login');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('Log in');
    }

    public function testRegisterPage()
    {
        $response = $this->getRestClient()->sendGet('register');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('Register');
    }

    public function testResettingRequestPage()
    {
        $response = $this->getRestClient()->sendGet('resetting/request');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('Resetting');
    }

    public function testArticlePage()
    {
        $response = $this->getRestClient()->sendGet('article');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('/article/create');
    }

    public function testAdminPageNoAuth()
    {
        $response = $this->getRestClient()->sendGet('admin');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::OK)
            ->assertSubsetText('Log in');
    }

    public function testNotFound()
    {
        $response = $this->getRestClient()->sendGet('qwerty');
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::NOT_FOUND)
            ->assertSubsetText('No route found');
    }

}
