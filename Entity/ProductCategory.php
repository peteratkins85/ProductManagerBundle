<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;

/**
 * ProductCategory
 */
class ProductCategory implements Translatable
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $active;

    /**
     * @var integer
     */
    private $parentId;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * @var string
     */
    private $productCategoryName;

    /**
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set active
     *
     * @param integer $active
     * @return ProductCategory
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
     * Set parentId
     *
     * @param integer $parentId
     * @return ProductCategory
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ProductCategory
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
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Add children
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $children
     * @return ProductCategory
     */
    public function addChild(\Cms\ProductManagerBundle\Entity\ProductCategory $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $children
     */
    public function removeChild(\Cms\ProductManagerBundle\Entity\ProductCategory $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $parent
     * @return ProductCategory
     */
    public function setParent(\Cms\ProductManagerBundle\Entity\ProductCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add products
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $products
     * @return ProductCategory
     */
    public function addProduct(\Cms\ProductManagerBundle\Entity\Products $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $products
     */
    public function removeProduct(\Cms\ProductManagerBundle\Entity\Products $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }



    /**
     * Get product category Name by Language ID
     *
     * @param integer $active
     * @return ProductCategory
     */
    public function setProductCategoryName($productCategoryName)
    {

        $this->productCategoryName = $productCategoryName;

        return $this;

    }

    public function getProductCategoryName(){

        return $this->productCategoryName;

    }

    public function __toString(){

        if ($this->productCategoryName){

            return (string) $this->productCategoryName;

        }

    }


    /**
     * @var integer
     */
    private $lft;

    /**
     * @var integer
     */
    private $rgt;

    /**
     * @var integer
     */
    private $root;

    /**
     * @var integer
     */
    private $lvl;


    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return ProductCategory
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return ProductCategory
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     *
     * @return ProductCategory
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return ProductCategory
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }


    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }


}
