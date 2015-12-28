<?php

namespace Cms\ProductManagerBundle\Controller;

use Cms\CoreBundle\Controller\CoreController;
use Cms\CoreBundle\Core;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoryDefinitionsRepository;
use Cms\ProductManagerBundle\Form\ProductCategoryType;
use Cms\ProductManagerBundle\Entity\ProductCategory;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductCategoryController extends CoreController
{

    private $productCategoriesEntity;
    private $productCategoryDefinitionsEntity;
    private $productCategoriesRepository ;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        ProductCategoryDefinitionsRepository $productCategoryDefinitionsRepository
    ){

        $this->ProductCategoryRepository =  $productCategoryRepository;
        $this->productCategoryDefinitionsRepository = $productCategoryDefinitionsRepository;

    }



    public function indexAction()
    {

        $productCategories = $this->ProductCategoryRepository->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => 'Product Categories',
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction(Request $request)
    {
        /**@var ProductCategory $productCategory **/
        //$productCategory = $this->getProductCategoryRepository()->find(1);
        $productCategory = $this->getProductCategoryEntity();
        //$productCategory->setTranslatableLocale('de_de');
        $productCategory->setProductCategoryName('German');
        $productCategory->getActive(0);

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getProductCategoryRepository();
        $repository->translate($productCategory, 'productCategoryName', 'de', 'my category de')
            ->translate($productCategory, 'productCategoryName', 'ru', 'my category ru')
        ;

        $em->persist($productCategory);
        $em->flush();
        exit;


        $productCategoryForm = $this->createForm(ProductCategoryType::class,$productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $languageId = $this->get('get_language');
                $em = $this->getDoctrine()->getManager();

                $em->persist($productCategory);

                $em->flush();

                $this->flashNotification('Product category added!');

                $productCategoryForm = $this->createForm(ProductCategoryType::class,$productCategory);

            }else{

                $this->flashErrors($productCategoryForm);

            }

        }

        return $this->render('ProductManagerBundle:ProductCategory:add.html.twig', array(
            'pageName' => 'Add Product Category',
            'form' => $productCategoryForm->createView()
        ));

    }



    public function editAction($productCategoryId)
    {



        return $this->render('ProductManagerBundle:ProductCategory:edit.html.twig', array(
                // ...
            ));

    }

}
