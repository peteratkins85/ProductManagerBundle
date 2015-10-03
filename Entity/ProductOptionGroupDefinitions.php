<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionGroupDefinitions
 */
class ProductOptionGroupDefinitions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $productOptionGroupName;

    /**
     * @var integer
     */
    private $languageId;

    /**
     * @var integer
     */
    private $productOptionGroupId;


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
     * Set productOptionGroupName
     *
     * @param string $productOptionGroupName
     * @return ProductOptionGroupDefinitions
     */
    public function setProductOptionGroupName($productOptionGroupName)
    {
        $this->productOptionGroupName = $productOptionGroupName;

        return $this;
    }

    /**
     * Get productOptionGroupName
     *
     * @return string 
     */
    public function getProductOptionGroupName()
    {
        return $this->productOptionGroupName;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductOptionGroupDefinitions
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set productOptionGroupId
     *
     * @param integer $productOptionGroupId
     * @return ProductOptionGroupDefinitions
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
     * @var \Cms\ProductManagerBundle\Entity\ProductOptionGroups
     */
    private $productOptionGroup;


    /**
     * Set productOptionGroup
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionGroups $productOptionGroup
     * @return ProductOptionGroupDefinitions
     */
    public function setProductOptionGroup(\Cms\ProductManagerBundle\Entity\ProductOptionGroups $productOptionGroup = null)
    {
        $this->productOptionGroup = $productOptionGroup;

        return $this;
    }

    /**
     * Get productOptionGroup
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductOptionGroups 
     */
    public function getProductOptionGroup()
    {
        return $this->productOptionGroup;
    }
}
