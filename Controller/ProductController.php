<?php

namespace App\Oni\ProductManagerBundle\Controller;

use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\CoreBundle\Controller\CoreController;
use App\Oni\ProductManagerBundle\Entity\Product;
use App\Oni\ProductManagerBundle\Form\ProductType;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductDataTable;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use App\Oni\ProductManagerBundle\Service\ProductOptionService;
use App\Oni\ProductManagerBundle\Service\ProductService;
use App\Oni\ProductManagerBundle\Service\ProductTypeService;
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
     * @var DataTable
     */
    protected $productDataTable;

    /**
     * @var ProductOptionService
     */
    protected $productOptionService;


    public function __construct(
        ProductService $productService,
        ProductTypeService $productTypeService,
        DataTable $productDataTable,
        ProductOptionService $productOptionService
    )
    {
        $this->productOptionService = $productOptionService;
        $this->productDataTable = $productDataTable;
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

    public function getProductsAction(Request $request)
    {
        $response = $this->productDataTable->getResults();

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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function wizardAction(Request $request, $id)
    {
        $product = new Product();

        if ($id) {
            $product = $this->productService->getProductById($id);

            if (!$product){
                $this->addFlash('error','Invalid product ID '.$id);
                return $this->redirectToRoute('oni_add_product');
            }
        }

        $productOptionGroups = $this->productOptionService->getAllProductOptionGroups();
        $productForm = $this->createForm(ProductType::class, $product);


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
            'optionGroups' => $productOptionGroups,
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(// ...
        ));

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction()
    {
        return $this->render('ProductManagerBundle:Product:edit.html.twig', array(// ...
        ));

    }

}
