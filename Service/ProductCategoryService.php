<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory\ProductCategoryDataTable;
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
     * ProductCategoryService constructor.
     * @param ObjectManager $objectManager
     * @param $class
     */
    public function __construct(
        ObjectManager $objectManager,
        $class
    )
    {
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

    /**
     * @param string $request
     * @return array
     */
    public function getProductCategoriesForDataTable($request = 's')
    {
        $countSpec = new ProductCategoryDataTable($request, 10, true);
        $totalCount = $this->productCategoryRepository->match($countSpec);
        $resultSpec   =  new ProductCategoryDataTable($request, 10);
        $results = $this->productCategoryRepository->match($resultSpec);

        $data = [
            'results' => $results,
            'total' => $totalCount[0]['total']
        ];

        return $data;
    }

}