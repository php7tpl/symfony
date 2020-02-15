<?php

namespace App\Bundle\Dashboard\Api\Controllers;

use PhpLab\Core\Exceptions\NotFoundException;
use PhpLab\Sandbox\Dashboard\Domain\Services\DocService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocController extends AbstractController
{

    private $docService;

    public function __construct()
    {
        $this->docService = new DocService;
    }

    public function index()
    {
        $versionList = $this->docService->versionList();
        $html = '<ul>';
        foreach ($versionList as $version) {
            $html .= "<li><a href=\"/api/v$version\">API version $version</a></li>";
        }
        $html .= '</ul>';
        return new Response($html);
    }

    public function show($version)
    {
        try {
            $htmlContent = $this->docService->htmlByVersion($version);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException("Not found API documentation for version v{$version}!");
        }
        return new Response($htmlContent);
    }

}
