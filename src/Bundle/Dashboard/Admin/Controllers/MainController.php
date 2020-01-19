<?php

namespace App\Bundle\Dashboard\Admin\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    public function index()
    {
        return $this->render('dashboard/admin/index.html.twig');
    }

}
