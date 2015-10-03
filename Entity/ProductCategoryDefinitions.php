<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryDefinitions
 */
class ProductCategoryDefinitions
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $productCategoryId;

    /**
     * @var integer
     */
    private $languageId;

    /**
     * @var string
     */
    private $productCategoryName;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductCategories
     */
    private $productCategory;

    /**
     * @var \Cms\ContentManagerBundle\Entity\Languages
     */
    private $language;


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
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     * @return ProductCategoryDefinitions
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
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductCategoryDefinitions
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
     * Set productCategoryName
     *
     * @param string $productCategoryName
     * @return ProductCategoryDefinitions
     */
    public function setProductCategoryName($productCategoryName)
    {
        $this->productCategoryName = $productCategoryName;

        return $this;
    }

    /**
     * Get productCategoryName
     *
     * @return string 
     */
    public function getProductCategoryName()
    {
        return $this->productCategoryName;
    }

    /**
     * Set productCategory
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductCategories $productCategory
     * @return ProductCategoryDefinitions
     */
    public function setProductCategory(\Cms\ProductManagerBundle\Entity\ProductCategories $productCategory = null)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductCategories 
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set language
     *
     * @param \Cms\ContentManagerBundle\Entity\Languages $language
     * @return ProductCategoryDefinitions
     */
    public function setLanguage(\Cms\ContentManagerBundle\Entity\Languages $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Cms\ContentManagerBundle\Entity\Languages 
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
