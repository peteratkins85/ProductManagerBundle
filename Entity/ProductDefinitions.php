<?php

namespace App\Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDefinitions
 *
 * @ORM\Table(name="oni_product_definitions")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductDefinitionsRepository")
 */
class ProductDefinitions
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
     * @ORM\Column(name="ProductName", type="string", length=255)
     */
    private $productName;

    /**
     * @var integer
     *
     * @ORM\Column(name="productId", type="integer")
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="languageId", type="integer")
     */
    private $languageId;



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
     *
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
     *
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
     *
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
}
