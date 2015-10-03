<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * productOptionGroups
 */
class ProductOptionGroups
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dataType;

    /**
     * @var string
     */
    private $optionGroupName;

    /**
     * @var string
     */
    private $userOptionSelectType;

    /**
     * @var integer
     */
    private $productCategoryId;


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
     * Set dataType
     *
     * @param string $dataType
     * @return ProductOptionGroups
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return string 
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Set optionGroupName
     *
     * @param string $optionGroupName
     * @return ProductOptionGroups
     */
    public function setOptionGroupName($optionGroupName)
    {
        $this->optionGroupName = $optionGroupName;

        return $this;
    }

    /**
     * Get optionGroupName
     *
     * @return string 
     */
    public function getOptionGroupName()
    {
        return $this->optionGroupName;
    }

    /**
     * Set userOptionSelectType
     *
     * @param string $userOptionSelectType
     * @return ProductOptionGroups
     */
    public function setUserOptionSelectType($userOptionSelectType)
    {
        $this->userOptionSelectType = $userOptionSelectType;

        return $this;
    }

    /**
     * Get userOptionSelectType
     *
     * @return string 
     */
    public function getUserOptionSelectType()
    {
        return $this->userOptionSelectType;
    }

    /**
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     * @return ProductOptionGroups
     */
    public function setProductCategoryId($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;

        return $this;
    }

    /**
     * Get productCategoryId
     *
     * @return integer 
     */
    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }
    /**
     * @var integer
     */
    private $optionGroupTypeId;

    /**
     * @var \Cms\ProductManagerBundle\Entity\optionGroupTypes
     */
    private $optionGroupType;


    /**
     * Set optionGroupTypeId
     *
     * @param integer $optionGroupTypeId
     * @return ProductOptionGroups
     */
    public function setOptionGroupTypeId($optionGroupTypeId)
    {
        $this->optionGroupTypeId = $optionGroupTypeId;

        return $this;
    }

    /**
     * Get optionGroupTypeId
     *
     * @return integer 
     */
    public function getOptionGroupTypeId()
    {
        return $this->optionGroupTypeId;
    }

    /**
     * Set optionGroupType
     *
     * @param \Cms\ProductManagerBundle\Entity\optionGroupTypes $optionGroupType
     * @return ProductOptionGroups
     */
    public function setOptionGroupType(\Cms\ProductManagerBundle\Entity\ProductOptionGroupTypes $optionGroupType = null)
    {
        $this->optionGroupType = $optionGroupType;

        return $this;
    }

    /**
     * Get optionGroupType
     *
     * @return \Cms\ProductManagerBundle\Entity\optionGroupTypes 
     */
    public function getOptionGroupType()
    {
        return $this->optionGroupType;
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
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionGroupDefinitions $definitions
     * @return ProductOptionGroups
     */
    public function addDefinition(\Cms\ProductManagerBundle\Entity\ProductOptionGroupDefinitions $definitions)
    {
        $this->definitions[] = $definitions;

        return $this;
    }

    /**
     * Remove definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionGroupDefinitions $definitions
     */
    public function removeDefinition(\Cms\ProductManagerBundle\Entity\ProductOptionGroupDefinitions $definitions)
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
