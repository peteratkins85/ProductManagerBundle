<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Form\ProductType;
use Oni\ProductManagerBundle\Service\ProductService;
use Oni\ProductManagerBundle\Entity\Repository\ProductsRepository;

/**
 * Class ProductController
 * @package Oni\ProductManagerBundle\Controller
 * @author peter.atkins85@gmail.com
 */
class ProductController extends CoreController
{

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct($productService)
    {
        $this->productService = $productService;
    }


    public function indexAction()
    {
        return $this->render(
            'ProductManagerBundle:Product:index.html.twig',
            ['pageName' => 'Products']
        );

    }

    public function addAction()
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $product = new Product();
        $productForm = $this->createForm(ProductType::class, $product);

        return $this->render('ProductManagerBundle:Product:add.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productForm->createView()
        ));

    }


    public function editAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(// ...
        ));

    }

}
