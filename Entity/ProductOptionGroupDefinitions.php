<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionGroupDefinitions
 *
 * @ORM\Table(name="product_option_group_definitions")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupDefinitionsRepository")
 */
class ProductOptionGroupDefinitions
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
     * @ORM\Column(name="productOptionGroupName", type="string", length=150)
     */
    private $productOptionGroupName;

    /**
     * @var integer
     *
     * @ORM\Column(name="languageId", type="integer")
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="productOptionGroupId", type="integer")
     */
    private $productOptionGroupId;



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
     * Set productOptionGroupName
     *
     * @param string $productOptionGroupName
     *
     * @return ProductOptionGroupDefinitions
     */
    public function setProductOptionGroupName($productOptionGroupName)
    {
        $this->productOptionGroupName = $productOptionGroupName;

        return $this;
    }

    /**
     * Get productOptionGroupName
     *
     * @return string
     */
    public function getProductOptionGroupName()
    {
        return $this->productOptionGroupName;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return ProductOptionGroupDefinitions
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
     * Set productOptionGroupId
     *
     * @param integer $productOptionGroupId
     *
     * @return ProductOptionGroupDefinitions
     */
    public function setProductOptionGroupId($productOptionGroupId)
    {
        $this->productOptionGroupId = $productOptionGroupId;

        return $this;
    }

    /**
     * Get productOptionGroupId
     *
     * @return integer
     */
    public function getProductOptionGroupId()
    {
        return $this->productOptionGroupId;
    }
}
