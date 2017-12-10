<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 30/11/2016
 * Time: 19:53
 */

namespace App\Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use App\Oni\CoreBundle\Exceptions\InvalidArgumentException;
use App\Oni\CoreBundle\Service\CoreService;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupRepository;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductOptionRepository;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductOptionsRepository;
use App\Oni\ProductManagerBundle\Entity\Repository\ProductTypesRepository;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use Proxies\__CG__\Oni\ProductManagerBundle\Entity\ProductOptionGroupTypes;

class ProductOptionService
{

    /**
     * @var ProductOptionRepository
     */
    protected $productOptionsRepository;

    /**
     * @var ProductOptionGroupRepository
     */
    protected $productOptionGroupRepository;

    /**
     * @var ObjectRepository
     */
    protected $productOptionGroupTypeRepository;

    /**
     * @var CoreService
     */
    protected $coreService;

    /**
     * ProductService constructor.
     * @param ObjectManager $objectManager
     * @param $class
     */
    public function __construct(
        ProductOptionRepository $productOptionsRepository,
        ProductOptionGroupRepository $productOptionGroupRepository,
        ObjectRepository $productOptionGroupTypeRepository,
        CoreService $coreService
    )
    {
        $this->productOptionsRepository = $productOptionsRepository;
        $this->coreService = $coreService;
        $this->productOptionGroupRepository = $productOptionGroupRepository;
        $this->productOptionGroupTypeRepository = $productOptionGroupTypeRepository;
    }

    /**
     * @return array
     */
    public function getAllProductOptions()
    {
        return $this->productOptionsRepository->findAll();
    }

    /**
     * @param $params
     * @return array
     * @throws InvalidArgumentException
     */
    public function getProductOptionsBy($params)
    {
        if (empty($params)) {
            throw new InvalidArgumentException('Params must not be empty');
        }

        return $this->productOptionsRepository->findBy($params);
    }

    /**
     * @return array
     */
    public function getAllProductOptionGroups(){
        return $this->productOptionGroupRepository->findAll();
    }

    /**
     * @param int $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getProductOptionGroupsById(int $id)
    {
        if (empty($id)) {
            throw new InvalidArgumentException('Id must not be empty');
        }

        return $this->productOptionGroupRepository->find($id);
    }

    /**
     * @param $params
     * @return array
     * @throws InvalidArgumentException
     */
    public function getProductOptionGroupsBy($params)
    {
        if (empty($params)) {
            throw new InvalidArgumentException('Params must not be empty');
        }

        return $this->productOptionGroupRepository->findBy($params);
    }

    /**
     * @return array
     */
    public function getAllProductOptionGroupTypes()
    {
        return $this->productOptionGroupTypeRepository->findAll();
    }

    /**
     * @param $params
     * @return array
     * @throws InvalidArgumentException
     */
    public function getProductOptionGroupTypesBy($params)
    {
        if (empty($params)) {
            throw new InvalidArgumentException('Params must not be empty');
        }

        return $this->productOptionGroupTypeRepository->findBy($params);
    }


    public function getProductOptionGroupsForDataTable(array $request)
    {
        $request['locale'] = $this->coreService->getLocale();
        $dataTable = new ProductOptionGroupDataTable(
            $this->productOptionGroupRepository,
            $request
        );

        return $dataTable->getResults();
    }

}