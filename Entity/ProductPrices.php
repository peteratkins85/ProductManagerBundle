<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductPrices
 */
class ProductPrices
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $productVarientId;

    /**
     * @var string
     */
    private $nowPrice;

    /**
     * @var string
     */
    private $wasPrice;

    /**
     * @var string
     */
    private $wholesalePrice;

    /**
     * @var integer
     */
    private $currencyId;


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
     * Set productVarientId
     *
     * @param integer $productVarientId
     * @return ProductVariantPrices
     */
    public function setProductVarientId($productVarientId)
    {
        $this->productVarientId = $productVarientId;

        return $this;
    }

    /**
     * Get productVarientId
     *
     * @return integer 
     */
    public function getProductVarientId()
    {
        return $this->productVarientId;
    }

    /**
     * Set nowPrice
     *
     * @param string $nowPrice
     * @return ProductVariantPrices
     */
    public function setNowPrice($nowPrice)
    {
        $this->nowPrice = $nowPrice;

        return $this;
    }

    /**
     * Get nowPrice
     *
     * @return string 
     */
    public function getNowPrice()
    {
        return $this->nowPrice;
    }

    /**
     * Set wasPrice
     *
     * @param string $wasPrice
     * @return ProductVariantPrices
     */
    public function setWasPrice($wasPrice)
    {
        $this->wasPrice = $wasPrice;

        return $this;
    }

    /**
     * Get wasPrice
     *
     * @return string 
     */
    public function getWasPrice()
    {
        return $this->wasPrice;
    }

    /**
     * Set wholesalePrice
     *
     * @param string $wholesalePrice
     * @return ProductVariantPrices
     */
    public function setWholesalePrice($wholesalePrice)
    {
        $this->wholesalePrice = $wholesalePrice;

        return $this;
    }

    /**
     * Get wholesalePrice
     *
     * @return string 
     */
    public function getWholesalePrice()
    {
        return $this->wholesalePrice;
    }

    /**
     * Set currencyId
     *
     * @param integer $currencyId
     * @return ProductVariantPrices
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Get currencyId
     *
     * @return integer 
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }
    /**
     * @var integer
     */
    private $productId;


    /**
     * Set productId
     *
     * @param integer $productId
     * @return ProductPrices
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
     * @var integer
     */
    private $zoneId = 1;

    /**
     * @var \Cms\ProductManagerBundle\Entity\Zones
     */
    private $zone;


    /**
     * Set zoneId
     *
     * @param integer $zoneId
     * @return ProductPrices
     */
    public function setZoneId($zoneId)
    {
        $this->zoneId = $zoneId;

        return $this;
    }

    /**
     * Get zoneId
     *
     * @return integer 
     */
    public function getZoneId()
    {
        return $this->zoneId;
    }

    /**
     * Set zone
     *
     * @param \Cms\ProductManagerBundle\Entity\Zones $zone
     * @return ProductPrices
     */
    public function setZone(\Cms\ContentManagerBundle\Entity\Zones $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \Cms\ProductManagerBundle\Entity\Zones 
     */
    public function getZone()
    {
        return $this->zone;
    }
    /**
     * @var \Cms\ProductManagerBundle\Entity\Currencies
     */
    private $currency;


    /**
     * Set currency
     *
     * @param \Cms\ProductManagerBundle\Entity\Currencies $currency
     * @return ProductPrices
     */
    public function setCurrency(\Cms\ProductManagerBundle\Entity\Currencies $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Cms\ProductManagerBundle\Entity\Currencies 
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
