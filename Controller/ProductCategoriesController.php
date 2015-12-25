<?php

namespace Cms\ProductManagerBundle\Controller;

use Cms\CoreBundle\Controller\CoreController;
use Cms\CoreBundle\Core;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoryDefinitionsRepository;
use Cms\ProductManagerBundle\Form\ProductCategoriesType;
use Cms\ProductManagerBundle\Entity\ProductCategories;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class ProductCategoriesController extends CoreController
{

    private $productCategoriesEntity;
    private $productCategoryDefinitionsEntity;
    private $productCategoriesRepository ;

    public function __construct(
        ProductCategoriesRepository $productCategoryRepository,
        ProductCategoryDefinitionsRepository $productCategoryDefinitionsRepository
    ){

        $this->productCategoriesRepository =  $productCategoryRepository;
        $this->productCategoryDefinitionsRepository = $productCategoryDefinitionsRepository;

    }



    public function indexAction()
    {

        $language = $this->getLanguage();

        $languageEnt = $this->container->get('language_repository')->findById($language->getId());
        $productCategory = new ProductCategories();
        $productCategoryDefinition = new ProductCategoryDefinitions();
        $productCategoryDefinition->setLanguage($languageEnt[0]);
        $productCategoryDefinition->setProductCategoryName('Test Cat');
        $productCategoryDefinition->setProductCategory($productCategory);
        $productCategory->getDefinitions()->add($productCategoryDefinition);


        $em = $this->getDoctrine()->getManager();

        $em->persist($productCategory);

//        $em->merge($productCategoryDefinition->getLanguage());
//        $em->merge($productCategoryDefinition->getProductCategory());

        $em->flush();

        exit;




        $productCategories = $this->productCategoriesRepository->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => 'Product Categories',
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction(Request $request)
    {

        $languageRepository = $this->getLanguageRepository();
        $languageId = $this->get('get_language');
        $productCategory = $this->getProductCategoriesEntity();
        $productCategoryDefinition = $this->getProductCategoryDefinitionsEntity();
        $productCategoryDefinition->setLanguage($languageRepository->find($languageId));
        $productCategory->addDefinition($productCategoryDefinition);

        $productCategoryForm = $this->createForm(ProductCategoriesType::class,$productCategory);

        if ($request->isMethod('POST')) {

            $productCategoryForm->handleRequest($request);

            if ($productCategoryForm->isSubmitted() && $productCategoryForm->isValid()) {

                $languageId = $this->get('get_language');

                //$productCategory->getDefinitions()[0]->setLanguage($languageRepository->find($languageId));
                $em = $this->getDoctrine()->getManager();

                $em->persist($productCategory);
                $em->flush();

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
