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
    private $productCategoryId;

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
     * @var \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    private $productCategory;

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
     *
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
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     *
     * @return Products
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
     * Set active
     *
     * @param integer $active
     *
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
     *
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
     *
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
     *
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
     *
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
     *
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
     * Add price
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductPrices $price
     *
     * @return Products
     */
    public function addPrice(\Cms\ProductManagerBundle\Entity\ProductPrices $price)
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * Remove price
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductPrices $price
     */
    public function removePrice(\Cms\ProductManagerBundle\Entity\ProductPrices $price)
    {
        $this->prices->removeElement($price);
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
     * Set productCategory
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $productCategory
     *
     * @return Products
     */
    public function setProductCategory(\Cms\ProductManagerBundle\Entity\ProductCategory $productCategory = null)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Add varient
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $varient
     *
     * @return Products
     */
    public function addVarient(\Cms\ProductManagerBundle\Entity\Products $varient)
    {
        $this->varients[] = $varient;

        return $this;
    }

    /**
     * Remove varient
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $varient
     */
    public function removeVarient(\Cms\ProductManagerBundle\Entity\Products $varient)
    {
        $this->varients->removeElement($varient);
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
     * Add definition
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductDefinitions $definition
     *
     * @return Products
     */
    public function addDefinition(\Cms\ProductManagerBundle\Entity\ProductDefinitions $definition)
    {
        $this->definitions[] = $definition;

        return $this;
    }

    /**
     * Remove definition
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductDefinitions $definition
     */
    public function removeDefinition(\Cms\ProductManagerBundle\Entity\ProductDefinitions $definition)
    {
        $this->definitions->removeElement($definition);
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
     *
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
     *
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
