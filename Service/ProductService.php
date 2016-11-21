<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Oni\ProductManagerBundle\Entity\Repository\ProductRepository;

class ProductService
{

    /**
     * @var ProductRepository
     */
    protected $productRepository;


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
        $this->productRepository = $objectManager->getRepository($class);
        $metadata = $objectManager->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    public function getAllProduct()
    {
        return $this->productRepository->getAllProduct();
    }

}