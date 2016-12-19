<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use Oni\ProductManagerBundle\Form\ProductForm;
use Oni\ProductManagerBundle\Form\ProductOptionGroupForm;
use Oni\ProductManagerBundle\Form\ProductType;
use Oni\ProductManagerBundle\Service\ProductService;
use Oni\ProductManagerBundle\Entity\Repository\ProductsRepository;
use Oni\ProductManagerBundle\Service\ProductTypeService;
use Symfony\Component\HttpFoundation\Request;

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
     * @var ProductTypeService
     */
    protected $productTypeService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param ProductTypeService $productTypeService
     */
    public function __construct(
        ProductService $productService,
        ProductTypeService $productTypeService
    )
    {
        $this->productService = $productService;
        $this->productTypeService = $productTypeService;
    }


    public function indexAction()
    {
        return $this->render(
            'ProductManagerBundle:Product:index.html.twig',
            ['pageName' => 'Products']
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Responses
     */
    public function addAction()
    {
        $productTypes = $this->productTypeService->getProductTypes([
            'visible' => 1
        ]);

        return $this->render('ProductManagerBundle:Product:add.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'productTypes' => $productTypes
        ));
    }

    public function wizardAction()
    {
        $product = new Product();
        $productForm = $this->createForm(ProductForm::class, $product);

        return $this->render('ProductManagerBundle:Product:wizard.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productForm->createView()
        ));
    }

    public function addOptionGroupAction(Request $request)
    {
        $productOptionGroup = new ProductOptionGroup();
        $productOptionGroupForm = $this->createForm(ProductOptionGroupForm::class, $productOptionGroup);

        if ($request->isMethod('POST')) {

            $productOptionGroupForm->handleRequest($request);

            if ($productOptionGroupForm->isSubmitted() && $productOptionGroupForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productOptionGroup);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_group_option_added'));

                return $this->redirectToRoute('oni_product_list');

            } else {

                $this->flashErrors($productCategoryForm);

            }

        }

        return $this->render('ProductManagerBundle:ProductOption:add-group.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productOptionGroupForm->createView()
        ));
    }

    public function editAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(// ...
        ));

    }

}
