<?php

namespace DeleteVideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@DeleteVideo/Default/index.html.twig');
    }
}
