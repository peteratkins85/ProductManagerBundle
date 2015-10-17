<?php

namespace Cms\ProductManagerBundle\Controller;

use Cms\CoreBundle\Controller\CoreController;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoryDefinitionsRepository;
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
        ProductCategoryDefinitionsRepository $productCategoryDefinitionsRepository,
        ProductCategories $productCategoriesEntity,
        ProductCategoryDefinitions $productCategoryDefinitionsEntity
    ){

        $this->productCategoriesRepository =  $productCategoryRepository;
        $this->productCategoryDefinitionsRepository = $productCategoryDefinitionsRepository;
        $this->productCategoriesEntity =  $productCategoriesEntity;
        $this->productCategoryDefinitionsEntity = $productCategoryDefinitionsEntity;

    }



    public function indexAction()
    {

        $productCategories = $this->productCategoriesRepository->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => 'Product Categories',
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction(Request $request)
    {
        //$productCategories = $this->productCategoryDefinitionsRepository->getFormProductCategoryChoices();

        $productCategoriesEntity = $this->getProductCategoriesEntity();

        $productCategoryForm = $this->createForm('product_category',$productCategoriesEntity);
        //echo var_dump($productCategoryForm); exit;

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
