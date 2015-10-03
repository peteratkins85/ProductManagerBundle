<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
/**
 * Products
 */
class Products
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var integer
     */
    private $primaryProductCategoryId;

    /**
     * @var integer
     */
    private $active;

    /**
     * @var integer
     */
    private $isVarientOf;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $modified;

    /**
     * @var integer
     */
    private $modifiedBy;

    /**
     * @var integer
     */
    private $productTypeId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prices;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductCategories
     */
    private $primaryCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $varients;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $definitions;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductTypes
     */
    private $productType;

    /**
     * @var \Cms\ProductManagerBundle\Entity\Products
     */
    private $masterProduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->varients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->definitions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set productName
     *
     * @param string $productName
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set primaryProductCategoryId
     *
     * @param integer $primaryProductCategoryId
     * @return Products
     */
    public function setPrimaryProductCategoryId($primaryProductCategoryId)
    {
        $this->primaryProductCategoryId = $primaryProductCategoryId;

        return $this;
    }

    /**
     * Get primaryProductCategoryId
     *
     * @return integer 
     */
    public function getPrimaryProductCategoryId()
    {
        return $this->primaryProductCategoryId;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Products
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set isVarientOf
     *
     * @param integer $isVarientOf
     * @return Products
     */
    public function setIsVarientOf($isVarientOf)
    {
        $this->isVarientOf = $isVarientOf;

        return $this;
    }

    /**
     * Get isVarientOf
     *
     * @return integer 
     */
    public function getIsVarientOf()
    {
        return $this->isVarientOf;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Products
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Products
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     * @return Products
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set productTypeId
     *
     * @param integer $productTypeId
     * @return Products
     */
    public function setProductTypeId($productTypeId)
    {
        $this->productTypeId = $productTypeId;

        return $this;
    }

    /**
     * Get productTypeId
     *
     * @return integer 
     */
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * Add prices
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductPrices $prices
     * @return Products
     */
    public function addPrice(\Cms\ProductManagerBundle\Entity\ProductPrices $prices)
    {
        $this->prices[] = $prices;

        return $this;
    }

    /**
     * Remove prices
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductPrices $prices
     */
    public function removePrice(\Cms\ProductManagerBundle\Entity\ProductPrices $prices)
    {
        $this->prices->removeElement($prices);
    }

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set primaryCategory
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategories $primaryCategory
     * @return Products
     */
    public function setPrimaryCategory(\Cms\ProductManagerBundle\Entity\ProductCategories $primaryCategory = null)
    {
        $this->primaryCategory = $primaryCategory;

        return $this;
    }

    /**
     * Get primaryCategory
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategories 
     */
    public function getPrimaryCategory()
    {
        return $this->primaryCategory;
    }

    /**
     * Add varients
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $varients
     * @return Products
     */
    public function addVarient(\Cms\ProductManagerBundle\Entity\Products $varients)
    {
        $this->varients[] = $varients;

        return $this;
    }

    /**
     * Remove varients
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $varients
     */
    public function removeVarient(\Cms\ProductManagerBundle\Entity\Products $varients)
    {
        $this->varients->removeElement($varients);
    }

    /**
     * Get varients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVarients()
    {
        return $this->varients;
    }

    /**
     * Add definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductDefinitions $definitions
     * @return Products
     */
    public function addDefinition(\Cms\ProductManagerBundle\Entity\ProductDefinitions $definitions)
    {
        $this->definitions[] = $definitions;

        return $this;
    }

    /**
     * Remove definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductDefinitions $definitions
     */
    public function removeDefinition(\Cms\ProductManagerBundle\Entity\ProductDefinitions $definitions)
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

    /**
     * Set productType
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductTypes $productType
     * @return Products
     */
    public function setProductType(\Cms\ProductManagerBundle\Entity\ProductTypes $productType = null)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductTypes 
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Set masterProduct
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $masterProduct
     * @return Products
     */
    public function setMasterProduct(\Cms\ProductManagerBundle\Entity\Products $masterProduct = null)
    {
        $this->masterProduct = $masterProduct;

        return $this;
    }

    /**
     * Get masterProduct
     *
     * @return \Cms\ProductManagerBundle\Entity\Products 
     */
    public function getMasterProduct()
    {
        return $this->masterProduct;
    }
}
