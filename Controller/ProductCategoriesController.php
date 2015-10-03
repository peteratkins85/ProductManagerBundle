<?php

namespace Cms\ProductManagerBundle\Controller;

use Cms\CoreBundle\Controller\CoreController;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Entity\ProductCategories;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Bundle\DoctrineBundle\Registry;
use appDevDebugProjectContainer;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductCategoriesController extends CoreController
{

    private $productCategoriesEntity;
    private $productCategoryDefinitionsEntity;
    private $productCategoriesRepository ;

    public function __construct(
        ProductCategoriesRepository $productCategoryRepository,
        ProductCategories $productCategoriesEntity,
        ProductCategoryDefinitions $productCategoryDefinitionsEntity
    ){

        $this->productCategoriesRepository =  $productCategoryRepository;
        $this->productCategoriesEntity =  $productCategoriesEntity;
        $this->productCategoryDefinitionsEntity = $productCategoryDefinitionsEntity;

    }



    public function indexAction()
    {

        $productCategories = $this->productCategoriesRepository->getAllProductCategories();

        $session = $this->getRequest();

        $session

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => 'Product Categories',
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction()
    {


        $em = $this->doctrine->getManager();

        $productCategory = new ProductCategories();
        $productCategory->setActive(1);
        $productCategory->setCreated(new \DateTime());
        $productCategory->setParentProductCategoryId(1);

        $em->persist($productCategory);
        $em->flush();

        $productCategoryDefinition = new ProductCategoryDefinitions();
        $productCategoryDefinition->setLanguage($em->find($this->container->getParameter('content_manager_entity_languages'), 1));
        $productCategoryDefinition->setProductCategory($productCategory);
        $productCategoryDefinition->setProductCategoryName('Test 123');


        $em->persist($productCategoryDefinition);
        $em->flush();


        return $this->render('ProductManagerBundle:ProductCategory:add.html.twig', array(

        ));
    }



    public function editAction($productCategoryId)
    {



        return $this->render('ProductManagerBundle:ProductCategory:edit.html.twig', array(
                // ...
            ));

    }

}
