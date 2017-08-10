<?php

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
     * @var ProductTypeService
     */
    protected $productTypeService;

    /**
     * @var ProductOptionService
     */
    protected $productOptionService;


    public function __construct(
        ObjectManager $objectManager,
        $class,
        ProductTypeService $productTypeService,
        ProductOptionService $productOptionService
    )
    {
        $this->productOptionService = $productOptionService;
        $this->productTypeService = $productTypeService;
        $this->productRepository = $objectManager->getRepository($class);
        $metadata = $objectManager->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * @return mixed
     */
    public function getAllProduct()
    {
        return $this->productRepository->getAllProduct();
    }

    /**
     * @param int $id
     * @return null|object
     */
    public function getProductById(int $id)
    {
        return $this->productRepository->find($id);
    }



}