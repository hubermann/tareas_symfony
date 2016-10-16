<?php

namespace TareasSymfony\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TareasSymfonyUserBundle:Default:index.html.twig');
    }
}
