<?php

namespace App\Bundle\Rails\Web\Controllers;

use App;
use PhpLab\Sandbox\Common\Libs\Benchmark;
use PhpLab\Sandbox\Crypt\Entities\JwtEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JwtController extends AbstractController
{

    protected $layoutRender = 'layout/main';

    public function actionIndex()
    {
        $jwtEntity = new JwtEntity;
        $jwtEntity->subject = [
            'id' => 123456,
        ];

        Benchmark::begin('jwt_generate');
        $token = \App::$container->jwt->sign($jwtEntity, 'auth');
        Benchmark::end('jwt_generate');

        Benchmark::begin('jwt_decode');
        $tokenEntity = \App::$container->jwt->verify($token, 'auth');
        Benchmark::end('jwt_decode');

        dd(Benchmark::allFlat());

        //return $this->render('sandbox/index', ['data' => Benchmark::allFlat()]);
    }

}
