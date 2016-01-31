<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionDefinitions
 *
 * @ORM\Table(name="product_option_definitions")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionDefinitionsRepository")
 */
class ProductOptionDefinitions
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
     * @var string
     *
     * @ORM\Column(name="productOptionName", type="string", length=150)
     */
    private $productOptionName;

    /**
     * @var integer
     *
     * @ORM\Column(name="languageId", type="integer")
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="productOptionId", type="integer")
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
     *
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
     *
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
     *
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
}
