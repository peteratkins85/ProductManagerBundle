<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 30/11/2016
 * Time: 19:53
 */

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Oni\CoreBundle\Exceptions\InvalidArgumentException;
use Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupRepository;
use Oni\ProductManagerBundle\Entity\Repository\ProductOptionRepository;
use Oni\ProductManagerBundle\Entity\Repository\ProductOptionsRepository;
use Oni\ProductManagerBundle\Entity\Repository\ProductTypesRepository;
use Proxies\__CG__\Oni\ProductManagerBundle\Entity\ProductOptionGroupTypes;

class ProductOptionService
{

    protected $productOptionsRepository;

    protected $productOptionGroupRepository;

    protected $productOptionGroupTypeRepository;

    /**
     * ProductService constructor.
     * @param ObjectManager $objectManager
     * @param $class
     */
    public function __construct(
        ProductOptionRepository $productOptionsRepository,
        ProductOptionGroupRepository $productOptionGroupRepository,
        ObjectRepository $productOptionGroupTypeRepository
    )
    {
        $this->productOptionsRepository = $productOptionsRepository;
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

}