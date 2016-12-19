<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionRelations
 *
 * @ORM\Table(name="oni_product_option_relations")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionRelationsRepository")
 */
class ProductOptionRelations
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
     * @ORM\Column(name="productOptionGroupId", type="integer")
     */
    private $productOptionGroupId;

    /**
     * @var integer
     *
     * @ORM\Column(name="productOptionId", type="integer")
     */
    private $productOptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="productVariantId", type="integer")
     */
    private $productVariantId;



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
     * Set productOptionGroupId
     *
     * @param integer $productOptionGroupId
     *
     * @return ProductOptionRelations
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

    /**
     * Set productOptionId
     *
     * @param integer $productOptionId
     *
     * @return ProductOptionRelations
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
     * Set productVariantId
     *
     * @param integer $productVariantId
     *
     * @return ProductOptionRelations
     */
    public function setProductVariantId($productVariantId)
    {
        $this->productVariantId = $productVariantId;

        return $this;
    }

    /**
     * Get productVariantId
     *
     * @return integer
     */
    public function getProductVariantId()
    {
        return $this->productVariantId;
    }
}
