<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionRelations
 */
class ProductOptionRelations
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $productOptionGroupId;

    /**
     * @var integer
     */
    private $productOptionId;

    /**
     * @var integer
     */
    private $productVariantId;


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
     * Set productOptionGroupId
     *
     * @param integer $productOptionGroupId
     * @return ProductOptionRelations
     */
    public function setProductOptionGroupId($productOptionGroupId)
    {
        $this->productOptionGroupId = $productOptionGroupId;

        return $this;
    }

    /**
     * Get productOptionGroupId
     *
     * @return integer 
     */
    public function getProductOptionGroupId()
    {
        return $this->productOptionGroupId;
    }

    /**
     * Set productOptionId
     *
     * @param integer $productOptionId
     * @return ProductOptionRelations
     */
    public function setProductOptionId($productOptionId)
    {
        $this->productOptionId = $productOptionId;

        return $this;
    }

    /**
     * Get productOptionId
     *
     * @return integer 
     */
    public function getProductOptionId()
    {
        return $this->productOptionId;
    }

    /**
     * Set productVariantId
     *
     * @param integer $productVariantId
     * @return ProductOptionRelations
     */
    public function setProductVariantId($productVariantId)
    {
        $this->productVariantId = $productVariantId;

        return $this;
    }

    /**
     * Get productVariantId
     *
     * @return integer 
     */
    public function getProductVariantId()
    {
        return $this->productVariantId;
    }
}