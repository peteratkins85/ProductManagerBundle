<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Oni\CoreBundle\Common\DataTable;
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

    /**
     * @param string $request
     * @return array
     */
    public function getProductCategoriesForDataTable(array $query)
    {
        $dataTable = new DataTable($query);

        $countSpec = new ProductCategoryDataTable(
            ['getRecordCount' => true, 'locale' => $this->locale, 'includeFilter' => false],
            $dataTable
        );
        $totalCount = $this->productCategoryRepository->match($countSpec);
        $totalCount = isset($totalCount[0]['total']) ? $totalCount[0]['total'] : 0;
        $dataTable->setRecordsTotal($totalCount);

        if ($dataTable->getSearch()){
            $filteredCountSpec = new ProductCategoryDataTable(
                ['getRecordCount' => true, 'locale'  => $this->locale],
                $dataTable
            );
            $filteredTotalCount = $this->productCategoryRepository->match($filteredCountSpec);
            $filteredTotalCount = isset($filteredTotalCount[0]['total']) ? $filteredTotalCount[0]['total'] : 0;
            $dataTable->setRecordsFiltered($filteredTotalCount);
        }else{
            $dataTable->setRecordsFiltered($totalCount);
        }

        $resultSpec = new ProductCategoryDataTable(
            ['locale' => $this->locale,],
            $dataTable
        );
        $results = $this->productCategoryRepository->match($resultSpec);
        $this->formatDateResults($results, 'jS M H:i:s');
        $dataTable->setResults($results);

        return $dataTable->getResponse();
    }

    public function formatDateResults(array &$resultData, string $dateFormat = 'Y-m-d H:i:s')
    {
        foreach ($resultData as &$data){
            if (is_array($data)){
                $this->formatDateResults($data, $dateFormat);
            }elseif ($data instanceof \DateTime) {
                $data = $data->format($dateFormat);
            }
        }
    }

}