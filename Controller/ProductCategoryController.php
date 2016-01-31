<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\CoreBundle\Core;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryDefinitionsRepository;
use Oni\ProductManagerBundle\Form\ProductCategoryType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;

class ProductCategoryController extends CoreController
{

    public function indexAction()
    {

        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access!');

        $productCategories = $this->getProductCategoryRepository()->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.product.categories'),
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction(Request $request)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $productCategory = $this->get('oni_product_category_entity');
        $productCategoryForm = $this->createForm(ProductCategoryType::class,$productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productCategory);

                $em->flush();

                $this->addFlash('notice',$this->translator->trans('product_bundle.product.category.deleted'));

                return $this->redirectToRoute('oni_categories_list');

            }else{

                $this->flashErrors($productCategoryForm);

            }

        }

        return $this->render('ProductManagerBundle:ProductCategory:add.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productCategoryForm->createView()
        ));

    }



    public function editAction($productCategoryId,Request $request)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access!');

        $productCategory = $this->getProductCategoryRepository()->find($productCategoryId);
        $productCategoryForm = $this->createForm(ProductCategoryType::class,$productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($productCategory);

                $em->flush();

                $this->addFlash('notice','Product category amended!');

                $em->refresh($productCategory);
                $productCategoryForm = $this->createForm(ProductCategoryType::class,$productCategory);

            }else{

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
            $this->addFlash('notice',$this->translator->trans('product_bundle.product.category.deleted'));

        }else{

            $this->addFlash('error', $this->translator->trans('product_bundle.invalid.product.category.id'));

        }

        return $this->redirectToRoute('oni_categories_list');

    }

}
