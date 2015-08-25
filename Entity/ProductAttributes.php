<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductAttributes
 */
class ProductAttributes
{
    /**
     * @var integer
     */
    private $id;


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
     * @var integer
     */
    private $productAttributeId;


    /**
     * Set productAttributeId
     *
     * @param integer $productAttributeId
     * @return ProductAttributes
     */
    public function setProductAttributeId($productAttributeId)
    {
        $this->productAttributeId = $productAttributeId;

        return $this;
    }

    /**
     * Get productAttributeId
     *
     * @return integer 
     */
    public function getProductAttributeId()
    {
        return $this->productAttributeId;
    }
}
