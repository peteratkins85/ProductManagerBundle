<?php
namespace App\Oni\ProductManagerBundle\Service\DataTable;


use Doctrine\Common\Persistence\ObjectRepository;
use App\Oni\CoreBundle\Common\CoreCommon;
use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\ProductManagerBundle\Doctrine\Spec\Product\ProductSearch;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductRepository;
use App\Oni\CoreBundle\Doctrine\Spec\LocaleTrait;
use App\Oni\CoreBundle\Common\LocaleAwareInterface;
use Exception;

class ProductDataTable extends DataTable implements LocaleAwareInterface
{

    use LocaleTrait;

    /**
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(ObjectRepository $repository, array $request)
    {
        if (empty($request['locale'])){
            throw new Exception('Locale must be set on the request query');
        }

        $this->setLocale($request['locale']);
        $this->repository = $repository;
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
        ];

        $resultSpec = new ProductSearch($params);
        $results = $this->repository->match($resultSpec);
        $results = CoreCommon::formatDateTimeResultsInArrayRecursive($results, 'jS M H:i:s');

        return $results;

    }

    /**
     * @param bool $includeFilter
     */
    public function queryAndSetTotalCount($includeFilter = false)
    {

        $params = [
            'getRecordCount' => true,
            'locale' => $this->locale,
        ];

        if ($includeFilter){
            $params['includeFilterOnGetRecordCount'] = true;
        }

        $countSpec = new ProductSearch($params);

        $totalCount = $this->repository->match($countSpec);
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

}           