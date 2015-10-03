<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductTypes
 */
class ProductTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $productType;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productType
     *
     * @param string $productType
     * @return ProductTypes
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return string 
     */
    public function getProductType()
    {
        return $this->productType;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $products
     * @return ProductTypes
     */
    public function addProduct(\Cms\ProductManagerBundle\Entity\Products $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $products
     */
    public function removeProduct(\Cms\ProductManagerBundle\Entity\Products $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
    /**
     * @var string
     */
    private $typeDescription;


    /**
     * Set typeDescription
     *
     * @param string $typeDescription
     * @return ProductTypes
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;

        return $this;
    }

    /**
     * Get typeDescription
     *
     * @return string 
     */
    public function getTypeDescription()
    {
        return $this->typeDescription;
    }
}
