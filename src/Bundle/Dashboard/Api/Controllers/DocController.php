<?php

namespace App\Bundle\Dashboard\Api\Controllers;

use PhpLab\Core\Legacy\Yii\Helpers\FileHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocController extends AbstractController
{

    public function show($version)
    {
        $docFileName = FileHelper::path("docs/api/dist/v{$version}.html");
        $htmlContent = @file_get_contents($docFileName);
        if(empty($htmlContent)) {
            throw new NotFoundHttpException("Not found API documentation for version v{$version}!");
        }
        return new Response($htmlContent);
    }

}
