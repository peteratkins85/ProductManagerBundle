<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductPrices
 *
 * @ORM\Table(name="oni_product_prices")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductPricesRepository")
 */
class ProductPrices
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
     * @var integer
     *
     * @ORM\Column(name="productId", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="nowPrice", type="decimal")
     */
    private $nowPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="wasPrice", type="decimal")
     */
    private $wasPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="wholesalePrice", type="decimal")
     */
    private $wholesalePrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="currencyId", type="integer")
     */
    private $currencyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zoneId", type="integer")
     */
    private $zoneId;

    /**
     * @var \Oni\ProductManagerBundle\Entity\Currency
     *
     * @ORM\OneToOne(targetEntity="Oni\ProductManagerBundle\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currencyId", referencedColumnName="id", unique=true)
     * })
     */
    private $currency;

    /**
     * @var \Oni\CoreBundle\Entity\Zone
     *
     * @ORM\OneToOne(targetEntity="Oni\CoreBundle\Entity\Zone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zoneId", referencedColumnName="id", unique=true)
     * })
     */
    private $zone;



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
     *
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
     * Set nowPrice
     *
     * @param string $nowPrice
     *
     * @return ProductPrices
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
     *
     * @return ProductPrices
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
     *
     * @return ProductPrices
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
     *
     * @return ProductPrices
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
     * Set zoneId
     *
     * @param integer $zoneId
     *
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
     * Set currency
     *
     * @param \Oni\ProductManagerBundle\Entity\Currency $currency
     *
     * @return ProductPrices
     */
    public function setCurrency(\Oni\ProductManagerBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Oni\ProductManagerBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set zone
     *
     * @param \Oni\CoreBundle\Entity\Zone $zone
     *
     * @return ProductPrices
     */
    public function setZone(\Oni\CoreBundle\Entity\Zone $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \Oni\CoreBundle\Entity\Zone
     */
    public function getZone()
    {
        return $this->zone;
    }
}
