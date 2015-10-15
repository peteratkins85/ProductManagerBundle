<?php

namespace Cms\ProductManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Cms\ProductManagerBundle\Entity\Repository\ProductsRepository;;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{

    private $templating;
    private $productsRepository;

    public function __construct
    (EngineInterface $templating,
    appDevDebugProjectContainer $serviceContainer,
    Session $session,
    ProductsRepository $productsRepository)
    {
        $this->templating = $templating;
        $this->productsRepository = $productsRepository;
        $this->serviceContainer = $serviceContainer;
        $this->session = $session;
    }

    public function indexAction()
    {

        $this->productsRepository->getAllProductCategories();
        return $this->templating->renderResponse('ProductManagerBundle:Product:product.html.twig', array(
            'pageName' => 'Products'
        ));

    }

    public function addAction()
    {
        return $this->render('ProductManagerBundle:Product:add.html.twig', array(
                // ...
        ));

    }



    public function editAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(
                // ...
            ));

    }

}
