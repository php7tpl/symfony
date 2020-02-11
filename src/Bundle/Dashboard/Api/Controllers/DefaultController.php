<?php

namespace App\Bundle\Dashboard\Api\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{

    public function root()
    {
        return new JsonResponse([
            'Message' => 'Please enter the API version in the URL!',
        ], 400);
    }

    public function index()
    {
        return new JsonResponse([
            'Message' => 'Please enter the resource entry point in the URL!',
        ], 400);
    }

}
