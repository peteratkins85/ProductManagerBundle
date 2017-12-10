<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 30/11/2016
 * Time: 19:53
 */

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Oni\CoreBundle\Exceptions\InvalidArgumentException;
use Oni\ProductManagerBundle\Entity\Repository\ProductTypesRepository;

class ProductTypeService
{

    /**
     * @var ProductTypesRepository
     */
    protected $productTypeRepository;

    /**
     * ProductService constructor.
     * @param ObjectManager $objectManager
     * @param $class
     */
    public function __construct(
        ObjectManager $objectManager,
        $class
    )
    {
        $this->productTypeRepository = $objectManager->getRepository($class);
        $metadata = $objectManager->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    public function getAllProductTypes()
    {
        return $this->productTypeRepository->findAll();
    }

    /**
     * @param $params
     * @return array
     * @throws InvalidArgumentException
     */
    public function getProductTypes($params)
    {
        if (empty($params)) {
            throw new InvalidArgumentException('Params must not be empty');
        }

        return $this->productTypeRepository->findBy($params);
    }

}