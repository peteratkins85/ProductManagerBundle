<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currencies
 */
class Currencies
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var integer
     */
    private $isDefault;


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
     * Set currency
     *
     * @param string $currency
     * @return Currencies
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return Currencies
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set isDefault
     *
     * @param integer $isDefault
     * @return Currencies
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return integer 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }
}
