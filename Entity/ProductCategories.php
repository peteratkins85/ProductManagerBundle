<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategories
 */
class ProductCategories
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
    private $parentProductCategoryId;

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
     * @var \Cms\ProductManagerBundle\Entity\ProductCategories
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

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
     * @return ProductCategories
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
     * Set parentProductCategoryId
     *
     * @param integer $parentProductCategoryId
     * @return ProductCategories
     */
    public function setParentProductCategoryId($parentProductCategoryId)
    {
        $this->parentProductCategoryId = $parentProductCategoryId;

        return $this;
    }

    /**
     * Get parentProductCategoryId
     *
     * @return integer 
     */
    public function getParentProductCategoryId()
    {
        return $this->parentProductCategoryId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ProductCategories
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
     * @return ProductCategories
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
     * @return ProductCategories
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
     * @param \Cms\ProductManagerBundle\Entity\ProductCategories $children
     * @return ProductCategories
     */
    public function addChild(\Cms\ProductManagerBundle\Entity\ProductCategories $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategories $children
     */
    public function removeChild(\Cms\ProductManagerBundle\Entity\ProductCategories $children)
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
     * @param \Cms\ProductManagerBundle\Entity\ProductCategories $parent
     * @return ProductCategories
     */
    public function setParent(\Cms\ProductManagerBundle\Entity\ProductCategories $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategories 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add products
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $products
     * @return ProductCategories
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $definitions;


    /**
     * Add definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions $definitions
     * @return ProductCategories
     */
    public function addDefinition(\Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions $definitions)
    {
        $this->definitions[] = $definitions;

        return $this;
    }

    /**
     * Remove definitions
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions $definitions
     */
    public function removeDefinition(\Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions $definitions)
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

    protected $productCategoryName;

    /**
     * Get product category Name
     *
     * @param integer $active
     * @return ProductCategories
     */
    public function setProductCategoryName($languageId = 1)
    {
        $this->productCategoryName = '';

        foreach ($this->definitions as $definition){

            if ($definition->getLanguageId() == $languageId){

                if ($definition->getProductCategoryName()) {

                    $this->productCategoryName = $definition->getProductCategoryName();

                    return $this;

                }

            }

        }

    }

    public function __toString(){

        if ($this->productCategoryName){

            return (string) $this->productCategoryName;

        }else{

            $this->setProductCategoryName();
            return (string) $this->productCategoryName;

        }



    }


}
