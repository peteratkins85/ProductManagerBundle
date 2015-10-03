<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionDefinitions
 */
class ProductOptionDefinitions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $productOptionName;

    /**
     * @var integer
     */
    private $languageId;

    /**
     * @var integer
     */
    private $productOptionId;


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
     * Set productOptionName
     *
     * @param string $productOptionName
     * @return ProductOptionDefinitions
     */
    public function setProductOptionName($productOptionName)
    {
        $this->productOptionName = $productOptionName;

        return $this;
    }

    /**
     * Get productOptionName
     *
     * @return string 
     */
    public function getProductOptionName()
    {
        return $this->productOptionName;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductOptionDefinitions
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
     * Set productOptionId
     *
     * @param integer $productOptionId
     * @return ProductOptionDefinitions
     */
    public function setProductOptionId($productOptionId)
    {
        $this->productOptionId = $productOptionId;

        return $this;
    }

    /**
     * Get productOptionId
     *
     * @return integer 
     */
    public function getProductOptionId()
    {
        return $this->productOptionId;
    }
    /**
     * @var \Cms\ContentManagerBundle\Entity\Languages
     */
    private $language;

    /**
     * @var \Cms\ProductManagerBundle\Entity\ProductOptions
     */
    private $productOption;


    /**
     * Set language
     *
     * @param \Cms\ContentManagerBundle\Entity\Languages $language
     * @return ProductOptionDefinitions
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

    /**
     * Set productOption
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptions $productOption
     * @return ProductOptionDefinitions
     */
    public function setProductOption(\Cms\ProductManagerBundle\Entity\ProductOptions $productOption = null)
    {
        $this->productOption = $productOption;

        return $this;
    }

    /**
     * Get productOption
     *
     * @return \Cms\ProductManagerBundle\Entity\ProductOptions 
     */
    public function getProductOption()
    {
        return $this->productOption;
    }
}
