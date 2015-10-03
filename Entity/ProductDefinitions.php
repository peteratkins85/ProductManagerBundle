<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDefinitions
 */
class ProductDefinitions
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
    private $productId;

    /**
     * @var integer
     */
    private $languageId;

    /**
     * @var \Cms\ContentManagerBundle\Entity\Languages
     */
    private $language;

    /**
     * @var \Cms\ProductManagerBundle\Entity\Products
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
     * Set productName
     *
     * @param string $productName
     * @return ProductDefinitions
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
     * Set productId
     *
     * @param integer $productId
     * @return ProductDefinitions
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
     * Set languageId
     *
     * @param integer $languageId
     * @return ProductDefinitions
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
     * Set language
     *
     * @param \Cms\ContentManagerBundle\Entity\Languages $language
     * @return ProductDefinitions
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
     * Set product
     *
     * @param \Cms\ProductManagerBundle\Entity\Products $product
     * @return ProductDefinitions
     */
    public function setProduct(\Cms\ProductManagerBundle\Entity\Products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Cms\ProductManagerBundle\Entity\Products 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
