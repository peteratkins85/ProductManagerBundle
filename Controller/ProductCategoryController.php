<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\CoreBundle\Core;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Form\ProductCategoryType;
use Oni\ProductManagerBundle\Service\ProductCategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductCategoryController extends CoreController
{

    /**
     * @var ProductCategoryService
     */
    protected $productCategoryService;


    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }


    public function indexAction()
    {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access!');

        //$productCategories = $this->productCategoryService->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
        ));

    }

    /**
     * @return JsonResponse
     */
    public function productListAction()
    {
        $productCategories = $this->productCategoryService->getProductCategoriesForDataTable();

        return new JsonResponse($productCategories);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $productCategory = new ProductCategory();
        $productCategoryForm = $this->createForm(ProductCategoryType::class, $productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productCategory);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_bundle.product.category.deleted'));

                return $this->redirectToRoute('oni_categories_list');

            } else {

                $this->flashErrors($productCategoryForm);

            }

        }

        return $this->render('ProductManagerBundle:ProductCategory:add.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productCategoryForm->createView()
        ));

    }


    public function editAction($productCategoryId, Request $request)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $productCategory = $this->productCategoryService->getProductCategoryById($productCategoryId);
        $productCategoryForm = $this->createForm(ProductCategoryType::class, $productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($productCategory);

                $em->flush();

                $this->addFlash('notice', 'Product category amended!');

                $em->refresh($productCategory);
                $productCategoryForm = $this->createForm(ProductCategoryType::class, $productCategory);

            } else {

                $this->flashErrors($productCategoryForm);

            }

        }

        return $this->render('ProductManagerBundle:ProductCategory:edit.html.twig', array(
            'pageName' => $this->translator->trans('product_bundle.edit.product.category'),
            'form' => $productCategoryForm->createView()
        ));

    }

    public function deleteAction($productCategoryId)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $productCategory = $this->getProductCategoryRepository()->find($productCategoryId);

        if ($productCategory) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($productCategory);
            $em->flush();
            $this->addFlash('notice', $this->translator->trans('product_bundle.product.category.deleted'));

        } else {

            $this->addFlash('error', $this->translator->trans('product_bundle.invalid.product.category.id'));

        }

        return $this->redirectToRoute('oni_categories_list');

    }

}
