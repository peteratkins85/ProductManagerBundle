<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductVariants
 */
class ProductVariants
{



    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $productId;

    /**
     * @var integer
     */
    private $active;

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
     * @var \Cms\ProductManagerBundle\Entity\products
     */
    private $product;


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
     * Set productId
     *
     * @param integer $productId
     * @return ProductVariants
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return ProductVariants
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
     * Set created
     *
     * @param \DateTime $created
     * @return ProductVariants
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
     * @return ProductVariants
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
     * @return ProductVariants
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
     * Set product
     *
     * @param \Cms\ProductManagerBundle\Entity\products $product
     * @return ProductVariants
     */
    public function setProduct(\Cms\ProductManagerBundle\Entity\products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Cms\ProductManagerBundle\Entity\products 
     */
    public function getProduct()
    {
        return $this->product;
    }
}