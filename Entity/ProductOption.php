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
     * @ORM\Column(name="optionGroupId", type="integer")
     */
    private $optionGroupId;

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
     * @var \Oni\ProductManagerBundle\Entity\ProductType
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroup", inversedBy="options", cascade={"persist"}))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optionGroupId", referencedColumnName="id")
     * })
     */
    private $optionGroup;




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
     * @return ProductOption
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
     * Set optionValue
     *
     * @param string $optionValue
     *
     * @return ProductOption
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
     * @return ProductOption
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

    /**
     * Set optionGroup
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroup $optionGroup
     *
     * @return ProductOption
     */
    public function setOptionGroup(\Oni\ProductManagerBundle\Entity\ProductOptionGroup $optionGroup = null)
    {
        $this->optionGroup = $optionGroup;

        return $this;
    }

    /**
     * Get optionGroup
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductOptionGroup
     */
    public function getOptionGroup()
    {
        return $this->optionGroup;
    }
}
