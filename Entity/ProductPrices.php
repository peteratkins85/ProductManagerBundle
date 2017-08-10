<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * ProductPrices
 *
 * @ORM\Table(name="oni_product_prices",
 *     uniqueConstraints={@UniqueConstraint(name="price_unique_idx", columns={"productId", "currencyId", "zoneId"})
 *     }
 * )
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
     * @ORM\Column(name="productId", type="integer")
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
     * @var \Oni\CoreBundle\Entity\Currency
     *
     * @ORM\ManyToOne(targetEntity="Oni\CoreBundle\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currencyId", referencedColumnName="id")
     * })
     */
    private $currency;

    /**
     * @var \Oni\CoreBundle\Entity\Zone
     *
     * @ORM\ManyToOne(targetEntity="Oni\CoreBundle\Entity\Zone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zoneId", referencedColumnName="id")
     * })
     */
    private $zone;

    /**
     * @var \Oni\ProductManagerBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\Product", inversedBy="prices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productId", referencedColumnName="id")
     * })
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
     * @param \Oni\CoreBundle\Entity\Currency $currency
     *
     * @return ProductPrices
     */
    public function setCurrency(\Oni\CoreBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Oni\CoreBundle\Entity\Currency
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

    /**
     * Set product
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $product
     *
     * @return ProductPrices
     */
    public function setProduct(\Oni\ProductManagerBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Oni\ProductManagerBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
