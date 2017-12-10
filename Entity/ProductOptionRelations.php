<?php

namespace App\Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * ProductOptionRelations
 *
 * @ORM\Table(name="oni_product_option_relations",
 *     uniqueConstraints={@UniqueConstraint(name="option_group_product_id_option_id_idx", columns={"productId","optionGroupId","optionId"})
 *     }
 * )
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
     * @ORM\Column(name="optionGroupId", type="integer")
     */
    private $optionGroupId;

    /**
     * @var integer
     *
     * @ORM\Column(name="optionId", type="integer")
     */
    private $optionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="variantId", type="integer")
     */
    private $variantId;

    /**
     * @var integer
     *
     * @ORM\Column(name="productId", type="integer")
     */
    private $productId;

    /**
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optionGroupId", referencedColumnName="id")
     * })
     */
    private $groupOption;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productId", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variantId", referencedColumnName="id")
     * })
     */
    private $variant;

    /**
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optionId", referencedColumnName="id")
     * })
     */
    private $option;


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
     * Set optionGroupId
     *
     * @param integer $optionGroupId
     *
     * @return ProductOptionRelations
     */
    public function setOptionGroupId($optionGroupId)
    {
        $this->optionGroupId = $optionGroupId;

        return $this;
    }

    /**
     * Get optionGroupId
     *
     * @return integer
     */
    public function getOptionGroupId()
    {
        return $this->optionGroupId;
    }

    /**
     * Set optionId
     *
     * @param integer $optionId
     *
     * @return ProductOptionRelations
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return ProductOptionRelations
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
     * Set groupOption
     *
     * @param \App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $groupOption
     *
     * @return ProductOptionRelations
     */
    public function setGroupOption(\App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $groupOption = null)
    {
        $this->groupOption = $groupOption;

        return $this;
    }

    /**
     * Get groupOption
     *
     * @return \App\Oni\ProductManagerBundle\Entity\ProductOptionGroup
     */
    public function getGroupOption()
    {
        return $this->groupOption;
    }

    /**
     * Set product
     *
     * @param \App\Oni\ProductManagerBundle\Entity\Product $product
     *
     * @return ProductOptionRelations
     */
    public function setProduct(\App\Oni\ProductManagerBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \App\Oni\ProductManagerBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set option
     *
     * @param \App\Oni\ProductManagerBundle\Entity\ProductOption $option
     *
     * @return ProductOptionRelations
     */
    public function setOption(\App\Oni\ProductManagerBundle\Entity\ProductOption $option = null)
    {
        $this->setGroupOption($option->getOptionGroup());
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return \App\Oni\ProductManagerBundle\Entity\ProductOption
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set variantId
     *
     * @param integer $variantId
     *
     * @return ProductOptionRelations
     */
    public function setVariantId($variantId)
    {
        $this->variantId = $variantId;

        return $this;
    }

    /**
     * Get variantId
     *
     * @return integer
     */
    public function getVariantId()
    {
        return $this->variantId;
    }

    /**
     * Set variant
     *
     * @param \App\Oni\ProductManagerBundle\Entity\Product $variant
     *
     * @return ProductOptionRelations
     */
    public function setVariant(\App\Oni\ProductManagerBundle\Entity\Product $variant = null)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * Get variant
     *
     * @return \App\Oni\ProductManagerBundle\Entity\Product
     */
    public function getVariant()
    {
        return $this->variant;
    }
}
