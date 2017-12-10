<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 01/12/2016
 * Time: 07:24
 */

namespace App\Oni\ProductManagerBundle\Service\DataTable;


use App\Oni\CoreBundle\Common\CoreCommon;
use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory\ProductCategorySearch;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use App\Oni\CoreBundle\Doctrine\Spec\LocaleTrait;
use App\Oni\CoreBundle\Common\LocaleAwareInterface;
use Exception;

class ProductCategoryDataTable extends DataTable implements LocaleAwareInterface
{

    use LocaleTrait;

    /**
     * @var ProductCategoryRepository
     */
    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository, array $request)
    {
        if (empty($request['locale'])){
            throw new Exception('Locale must be set on the request query');
        }

        $this->setLocale($request['locale']);
        $this->productCategoryRepository = $productCategoryRepository;
        parent::__construct($request);
    }

    /**
     * Query data source
     */
    public function queryData()
    {
        $this->queryAndSetTotalCount();

        if ($this->getSearch()){
            $this->queryAndSetTotalCount(true);
        }

        $params = [
            'locale' => $this->locale,
            'order'  => $this->getOrder(),
            'orderBy'=> $this->getOrderBy(),
            'offset' => $this->getStart(),
            'search' => $this->getSearch(),
            'fields' => $this->getFields(),
        ];

        $qb = $this->productCategoryRepository->createQueryBuilder('c');

        $qb->select('c.id');


        $resultSpec = new ProductCategorySearch($params);
        $results = $this->productCategoryRepository->match($resultSpec);
        $results = CoreCommon::formatDateTimeResultsInArrayRecursive($results, 'jS M H:i:s');
        return $results;

    }

    public function queryAndSetTotalCount($includeFilter = false)
    {

        $params = [
            'getRecordCount' => true,
            'locale' => $this->locale
        ];

        if ($includeFilter){
            $params['includeFilterOnGetRecordCount'] = true;
        }

        $countSpec = new ProductCategorySearch($params);

        $totalCount = $this->productCategoryRepository->match($countSpec);
        $totalCount = isset($totalCount[0]['total']) ? $totalCount[0]['total'] : 0;

        if ($includeFilter){
            $this->setRecordsFiltered($totalCount);
        }else {
            $this->setRecordsTotal($totalCount);
        }

        if (!$includeFilter && !$this->search){
            $this->setRecordsFiltered($totalCount);
        }

    }

}