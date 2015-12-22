<?php

namespace Cms\ProductManagerBundle\Controller;

use Cms\CoreBundle\Controller\CoreController;
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

        $productCategories = $this->productCategoriesRepository->getAllProductCategories();

        return $this->render('ProductManagerBundle:ProductCategory:index.html.twig', array(
            'pageName' => 'Product Categories',
            'productCategories' => $productCategories['results'],
            'titles' => $productCategories['titles']
        ));

    }

    public function addAction(Request $request)
    {

        $productCategory = $this->get('product_categories');
        $productCategoryDefinition = $this->get('product_category_definitions');
        $productCategoryDefinition->setLanguage($this->getLanguage());
        $productCategory->getDefinitions()->add($productCategoryDefinition);

        $productCategoryForm = $this->createForm(ProductCategoriesType::class,$productCategory);

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
