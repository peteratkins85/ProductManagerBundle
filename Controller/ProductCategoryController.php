<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\CoreBundle\Core;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Form\ProductCategoryForm;
use Oni\ProductManagerBundle\Form\ProductCategoryType;
use Oni\ProductManagerBundle\Service\ProductCategoryDataTable;
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

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
        ));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductCategoriesAction(Request $request)
    {
        $query = $request->query->all();
        $response = $this->productCategoryService->getProductCategoriesForDataTable($query);

        return new JsonResponse($response);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {

        $productCategory = new ProductCategory();
        $productCategoryForm = $this->createForm(ProductCategoryForm::class, $productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productCategory);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_bundle.product.category.added'));

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

        $productCategory = $this->productCategoryService->getProductCategoryById($productCategoryId);

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
