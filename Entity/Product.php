<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Oni\CoreBundle\Entity\Traits\TimestampableEntity;

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

    use TimestampableEntity;

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
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=10)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=15)
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
     */
    private $upc;

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="string", length=20)
     */
    private $visibility;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="isVariantOf", type="integer", nullable=true)
     */
    private $isVariantOf;

    /**
     * @var integer
     *
     * @ORM\Column(name="productTypeId", type="integer")
     */
    private $productTypeId;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $defaultProductCategoryId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $shortDescription;

    /**
     * @var string
     * @ORM\Column(name="tags", type="string")
     */
    private $tags;

    /**
     * @var integer
     * @ORM\Column(name="saleable",type="boolean")
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
     *   @ORM\JoinColumn(name="isVariantOf", referencedColumnName="id", onDelete="CASCADE")
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

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Product
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Product
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set saleable
     *
     * @param boolean $saleable
     *
     * @return Product
     */
    public function setSaleable($saleable)
    {
        $this->saleable = $saleable;

        return $this;
    }

    /**
     * Get saleable
     *
     * @return boolean
     */
    public function getSaleable()
    {
        return $this->saleable;
    }

    /**
     * Set isVariantOf
     *
     * @param integer $isVariantOf
     *
     * @return Product
     */
    public function setIsVariantOf($isVariantOf)
    {
        $this->isVariantOf = $isVariantOf;

        return $this;
    }

    /**
     * Get isVariantOf
     *
     * @return integer
     */
    public function getIsVariantOf()
    {
        return $this->isVariantOf;
    }

    /**
     * Set sku
     *
     * @param string $sku
     *
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set upc
     *
     * @param string $upc
     *
     * @return Product
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;

        return $this;
    }

    /**
     * Get upc
     *
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Product
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }
}
