<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Oni\ProductManagerBundle\Entity\Repository\ProductsRepository;;
use Symfony\Component\HttpFoundation\Session\Session;
use Oni\ProductManagerBundle\Form\ProductType;

class ProductController extends CoreController
{

    public function indexAction()
    {

        $products = $this->getProductRepository()->getAllProduct();
        return $this->render('ProductManagerBundle:Product:index.html.twig', array(
            'pageName' => 'Products',
            'products' => $products['results'],
            'titles' => $products['titles']
        ));

    }

    public function addAction()
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $product = $this->get('oni_product_entity');
        $productForm = $this->createForm(ProductType::class, $product);

        return $this->render('ProductManagerBundle:Product:add.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productForm->createView()
        ));

    }



    public function editAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(
                // ...
            ));

    }

}
