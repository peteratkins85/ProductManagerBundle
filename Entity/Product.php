<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Product
 *
 * @ORM\Table(name="oni_products")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductRepository")
 * @Gedmo\TranslationEntity(class="Oni\ProductManagerBundle\Entity\ProductTranslations")
 *
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Gedmo\Translatable
     * @ORM\Column(name="productName", type="string", length=50)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="productCode", type="string", length=10)
     */
    private $productCode;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=15)
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="string", length=20)
     */
    private $visibility;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="integer")
     */
    private $enabled = 1;



    /**
     * @var integer
     *
     * @ORM\Column(name="isVarientOf", type="integer", nullable=true)
     */
    private $isVarientOf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="time")
     */
    private $modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="modifiedBy", type="integer")
     */
    private $modifiedBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="productTypeId", type="integer")
     */
    private $productTypeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="defaultProductCategoryId", type="integer")
     */
    private $defaultProductCategoryId;

    /***
     *
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     *
     */
    private $description;


    /***
     *
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="string")
     *
     */
    private $shortDescription;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="tags", type="string")
     *
     */
    private $tags;

    /**
     *
     * @var integer
     *
     * @ORM\Column(name="saleable",type="integer")
     *
     */
    private $saleable;



    /**
     *
     * @ORM\OneToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="defaultProductCategoryId", referencedColumnName="id")
     * })
     */
    private $defaultProductCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\Product", mappedBy="parentProduct")
     */
    private $variants;

    /**
     * @var \Oni\ProductManagerBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\Product", inversedBy="variants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="isVarientOf", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $parentProduct;

    /**
     * @var \Oni\ProductManagerBundle\Entity\ProductTypes
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductTypes", inversedBy="products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productTypeId", referencedColumnName="id")
     * })
     */
    private $productType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Oni\ProductManagerBundle\Entity\ProductPrices")
     * @ORM\JoinTable(name="products_price_relations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="productId", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="productPriceId", referencedColumnName="id", unique=true)
     *   }
     * )
     */
    private $prices;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Set productCode
     *
     * @param string $productCode
     *
     * @return Product
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * Get productCode
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Set visibility
     *
     * @param string $visibility
     *
     * @return Product
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Add variant
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $variant
     *
     * @return Product
     */
    public function addVariant(\Oni\ProductManagerBundle\Entity\Product $variant)
    {
        $this->variants[] = $variant;

        return $this;
    }

    /**
     * Remove variant
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $variant
     */
    public function removeVariant(\Oni\ProductManagerBundle\Entity\Product $variant)
    {
        $this->variants->removeElement($variant);
    }

    /**
     * Get variants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * Set parentProduct
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $parentProduct
     *
     * @return Product
     */
    public function setParentProduct(\Oni\ProductManagerBundle\Entity\Product $parentProduct = null)
    {
        $this->parentProduct = $parentProduct;

        return $this;
    }

    /**
     * Get parentProduct
     *
     * @return \Oni\ProductManagerBundle\Entity\Product
     */
    public function getParentProduct()
    {
        return $this->parentProduct;
    }

    /**
     * Set productType
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductTypes $productType
     *
     * @return Product
     */
    public function setProductType(\Oni\ProductManagerBundle\Entity\ProductTypes $productType = null)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductTypes
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Add price
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductPrices $price
     *
     * @return Product
     */
    public function addPrice(\Oni\ProductManagerBundle\Entity\ProductPrices $price)
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * Remove price
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductPrices $price
     */
    public function removePrice(\Oni\ProductManagerBundle\Entity\ProductPrices $price)
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
     * Set defaultProductCategoryId
     *
     * @param integer $defaultProductCategoryId
     *
     * @return Product
     */
    public function setDefaultProductCategoryId($defaultProductCategoryId)
    {
        $this->defaultProductCategoryId = $defaultProductCategoryId;

        return $this;
    }

    /**
     * Get defaultProductCategoryId
     *
     * @return integer
     */
    public function getDefaultProductCategoryId()
    {
        return $this->defaultProductCategoryId;
    }

    /**
     * Set defaultProductCategory
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductCategory $defaultProductCategory
     *
     * @return Product
     */
    public function setDefaultProductCategory(\Oni\ProductManagerBundle\Entity\ProductCategory $defaultProductCategory = null)
    {
        $this->defaultProductCategory = $defaultProductCategory;

        return $this;
    }

    /**
     * Get defaultProductCategory
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductCategory
     */
    public function getDefaultProductCategory()
    {
        return $this->defaultProductCategory;
    }




    /**
     * Set barcode
     *
     * @param string $barcode
     *
     * @return Product
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }
}
