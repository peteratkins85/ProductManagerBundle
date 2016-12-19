<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptions
 *
 * @ORM\Table(name="oni_product_options")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionRepository")
 */
class ProductOption
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
     * @ORM\Column(name="productOptionGroupsId", type="integer")
     */
    private $productOptionGroupsId;

    /**
     * @var
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="optionValue", type="string", length=100)
     */
    private $optionValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="optionPriority", type="integer")
     */
    private $optionPriority;



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
     * Set productOptionGroupsId
     *
     * @param integer $productOptionGroupsId
     *
     * @return ProductOptions
     */
    public function setProductOptionGroupsId($productOptionGroupsId)
    {
        $this->productOptionGroupsId = $productOptionGroupsId;

        return $this;
    }

    /**
     * Get productOptionGroupsId
     *
     * @return integer
     */
    public function getProductOptionGroupsId()
    {
        return $this->productOptionGroupsId;
    }

    /**
     * Set optionValue
     *
     * @param string $optionValue
     *
     * @return ProductOptions
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set optionPriority
     *
     * @param integer $optionPriority
     *
     * @return ProductOptions
     */
    public function setOptionPriority($optionPriority)
    {
        $this->optionPriority = $optionPriority;

        return $this;
    }

    /**
     * Get optionPriority
     *
     * @return integer
     */
    public function getOptionPriority()
    {
        return $this->optionPriority;
    }
}
