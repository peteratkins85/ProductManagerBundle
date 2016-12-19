<?php

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;

/**
 * Class ProductCategoryService
 * @package Oni\ProductManagerBundle\Service
 * @author peter.atkins85@gmail.com
 */
class ProductCategoryService
{

    /**
     * @var ProductCategoryRepository
     */
    protected $productCategoryRepository;

    /**
     * @var string
     */
    protected $locale;


    /**
     * ProductCategoryService constructor.
     * @param ObjectManager $objectManager
     * @param $class
     */
    public function __construct(
        ObjectManager $objectManager,
        string $class,
        string $locale
    )
    {
        $this->locale = $locale;
        $this->productCategoryRepository = $objectManager->getRepository($class);
        $metadata = $objectManager->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * @return array
     */
    public function getAllProductCategories()
    {
        return $this->productCategoryRepository->getAllProductCategories();
    }

    /**
     * @param int $productCategoryId
     * @return null|object
     */
    public function getProductCategoryById($productCategoryId)
    {
        return $this->productCategoryRepository->find($productCategoryId);
    }

    /**
     * @param $exclude
     * @return object
     */
    public function findAllWithFallBack($exclude)
    {
        return $this->productCategoryRepository->findAllWithFallBack($exclude);
    }


    public function getProductCategoryRepository()
    {
        return $this->productCategoryRepository;
    }

    /**
     * @param string $request
     * @return array
     */
    public function getProductCategoriesForDataTable(array $request)
    {
        $request['locale'] = $this->locale;
        $dataTable = new ProductCategoryDataTable(
            $this->productCategoryRepository,
            $request
        );

        return $dataTable->getResults();

    }



}