<?php

namespace Oni\ProductManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProductManagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
