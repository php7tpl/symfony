<?php

namespace App\Bundle\Dashboard\Web\Controllers;

use PhpLab\Core\Domain\Libs\Query;
use PhpBundle\Article\Domain\Interfaces\PostServiceInterface;
use PhpBundle\Notify\Domain\Entities\EmailEntity;
use PhpBundle\Notify\Domain\Entities\SmsEntity;
use PhpBundle\Notify\Domain\Interfaces\Services\EmailServiceInterface;
use PhpBundle\Queue\Domain\Interfaces\Services\JobServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    private $postService;
    private $emailService;
    private $jobService;

    public function __construct(PostServiceInterface $postService, EmailServiceInterface $emailService, JobServiceInterface $jobService)
    {
        $this->postService = $postService;
        $this->emailService = $emailService;
        $this->jobService = $jobService;
    }

    public function index()
    {
        $query = new Query;
        $query->with('category');
        $query->perPage(5);
        $postCollection = $this->postService->all($query);
        return $this->render('dashboard/web/index.html.twig', [
            'postCollection' => $postCollection,
            'links' => [
                [
                    'title' => 'API - auth',
                    'url' => '/api/v1/auth',
                ],
                [
                    'title' => 'API - rbac',
                    'url' => '/api/v1/rbac',
                ],
                [
                    'title' => 'API - article-post',
                    'url' => '/api/v1/article-post',
                ],
                [
                    'title' => 'Web - messenger-chat',
                    'url' => '/chat',
                ],
                [
                    'title' => 'API - messenger-chat',
                    'url' => '/api/v1/messenger-chat',
                ],
                [
                    'title' => 'API - article-post (PHP)',
                    'url' => '/php/v1/article-post',
                ],

                [
                    'title' => 'rails',
                    'url' => '/rails',
                ],
            ],
        ]);
    }

    public function index2222()
    {
        //$user = $this->container->get('security.token_storage')->getToken()->getUser();
        //dd($user);

        $email = new EmailEntity;
        $email->setFrom('from@mail.ru');
        $email->setTo('theyamshikov@yandex.ru');
        $email->setSubject('Subject text');
        $email->setBody('Body text');
        $this->emailService->push($email);

        $this->jobService->runAll('email');

        $query = new Query;
        $query->with('category');
        $query->perPage(5);
        $postCollection = $this->postService->all($query);
        return $this->render('dashboard/web/index.html.twig', [
            'postCollection' => $postCollection,
            'links' => [
                [
                    'title' => 'API - auth',
                    'url' => '/api/v1/auth',
                ],
                [
                    'title' => 'API - rbac',
                    'url' => '/api/v1/rbac',
                ],
                [
                    'title' => 'API - article-post',
                    'url' => '/api/v1/article-post',
                ],
                [
                    'title' => 'Web - messenger-chat',
                    'url' => '/chat',
                ],
                [
                    'title' => 'API - messenger-chat',
                    'url' => '/api/v1/messenger-chat',
                ],
                [
                    'title' => 'API - article-post (PHP)',
                    'url' => '/php/v1/article-post',
                ],

                [
                    'title' => 'rails',
                    'url' => '/rails',
                ],
            ],
        ]);
    }

}
