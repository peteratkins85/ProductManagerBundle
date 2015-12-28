<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
/**
 * ProductCategoryDefinitions
 */
class ProductCategoryDefinitions implements Translatable
{

    /**
     * @var integer
     */
    private $id;


    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    /**
     * @var string
     */
    private $productCategoryName;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductCategory
     */
    private $productCategory;

    /**
     * @var \Cms\ContentManagerBundle\Entity\Languages
     */
    private $language;


    public function __toString(){

        return (string) $this->productCategoryName;

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



    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
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
     * @param \Cms\ProductManagerBundle\Entity\ProductCategory $productCategory
     * @return ProductCategoryDefinitions
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
     * Set language
     *
     * @param \Cms\ContentManagerBundle\Entity\Languages $language
     * @return ProductCategoryDefinitions
     */
    public function setLanguage(\Cms\CoreBundle\Entity\Languages $language = null)
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


    /**
     * @var integer
     */
    private $productCategoryId;


    /**
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     *
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
     * @var integer
     */
    private $languageId;


    /**
     * Set languageId
     *
     * @param integer $languageId
     *
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
}
