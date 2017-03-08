<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use Oni\ProductManagerBundle\Form\ProductForm;
use Oni\ProductManagerBundle\Form\ProductOptionGroupForm;
use Oni\ProductManagerBundle\Form\ProductType;
use Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use Oni\ProductManagerBundle\Service\ProductService;
use Oni\ProductManagerBundle\Entity\Repository\ProductsRepository;
use Oni\ProductManagerBundle\Service\ProductTypeService;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @var ProductOptionGroupDataTable
     */
    protected $productOptionGroupDataTable;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param ProductTypeService $productTypeService
     * @param ProductOptionGroupDataTable $productOptionGroupDataTable
     */
    public function __construct(
        ProductService $productService,
        ProductTypeService $productTypeService
    )
    {
        $this->productService = $productService;
        $this->productTypeService = $productTypeService;
        $this->productOptionGroupDataTable = $productOptionGroupDataTable;
    }

    public function indexAction()
    {
        return $this->render(
            'ProductManagerBundle:Product:index.html.twig',
            ['pageName' => 'Products']
        );
    }

    public function getProductsAction(Request $request)
    {
        $response = $this->productOptionGroupDataTable->getResults();

        return new JsonResponse($response);
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

    public function wizardAction(Request $request)
    {
        $product = new Product();
        $productForm = $this->createForm(ProductForm::class, $product);
        $selectedCategories = [];
        $defaultProductCategory = null;

        if ($request->isMethod('POST')) {

            $productForm->handleRequest($request);

            if ($productForm->isSubmitted() && $productForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($product);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_bundle.product.added'));

                return $this->redirectToRoute('oni_product_list');

            } else {

                $this->flashErrors($productForm);
                $selectedCategories = $productForm->getData()->getCategories();
                $defaultProductCategory = $productForm->getData()->getDefaultProductCategory();

            }

        }

        return $this->render('ProductManagerBundle:Product:wizard.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productForm->createView(),
            'selectedCategories' => $selectedCategories,
            'selectedDefaultCategory' => $defaultProductCategory,
        ));
    }

    public function editAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(// ...
        ));

    }

}
