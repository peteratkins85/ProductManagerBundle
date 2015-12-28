<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptions
 */
class ProductOptions
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $productOptionGroupsId;

    /**
     * @var string
     */
    private $optionValue;

    /**
     * @var integer
     */
    private $optionPriority;


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
     * Set productOptionGroupsId
     *
     * @param integer $productOptionGroupsId
     * @return ProductOptions
     */
    public function setProductOptionGroupsId($productOptionGroupsId)
    {
        $this->productOptionGroupsId = $productOptionGroupsId;

        return $this;
    }

    /**
     * Get productOptionGroupsId
     *
     * @return integer 
     */
    public function getProductOptionGroupsId()
    {
        return $this->productOptionGroupsId;
    }

    /**
     * Set optionValue
     *
     * @param string $optionValue
     * @return ProductOptions
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string 
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set optionPriority
     *
     * @param integer $optionPriority
     * @return ProductOptions
     */
    public function setOptionPriority($optionPriority)
    {
        $this->optionPriority = $optionPriority;

        return $this;
    }

    /**
     * Get optionPriority
     *
     * @return integer 
     */
    public function getOptionPriority()
    {
        return $this->optionPriority;
    }
    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    private $product;


    /**
     * Set product
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $product
     * @return ProductOptions
     */
    public function setProduct(\Cms\ProductManagerBundle\Entity\ProductCategory $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $definitions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->definitions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionDefinitions $definitions
     * @return ProductOptions
     */
    public function addDefinition(\Cms\ProductManagerBundle\Entity\ProductOptionDefinitions $definitions)
    {
        $this->definitions[] = $definitions;

        return $this;
    }

    /**
     * Remove definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionDefinitions $definitions
     */
    public function removeDefinition(\Cms\ProductManagerBundle\Entity\ProductOptionDefinitions $definitions)
    {
        $this->definitions->removeElement($definitions);
    }

    /**
     * Get definitions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }
}
