<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionGroupTypes
 *
 * @ORM\Table(name="product_option_group_types")
 * @ORM\Entity
 */
class ProductOptionGroupTypes
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
     * @ORM\Column(name="optionType", type="string", length=100)
     */
    private $optionType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroups", mappedBy="optionGroupType")
     */
    private $optionGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->optionGroups = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set optionType
     *
     * @param string $optionType
     *
     * @return ProductOptionGroupTypes
     */
    public function setOptionType($optionType)
    {
        $this->optionType = $optionType;

        return $this;
    }

    /**
     * Get optionType
     *
     * @return string
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * Add optionGroup
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroups $optionGroup
     *
     * @return ProductOptionGroupTypes
     */
    public function addOptionGroup(\Oni\ProductManagerBundle\Entity\ProductOptionGroups $optionGroup)
    {
        $this->optionGroups[] = $optionGroup;

        return $this;
    }

    /**
     * Remove optionGroup
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroups $optionGroup
     */
    public function removeOptionGroup(\Oni\ProductManagerBundle\Entity\ProductOptionGroups $optionGroup)
    {
        $this->optionGroups->removeElement($optionGroup);
    }

    /**
     * Get optionGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptionGroups()
    {
        return $this->optionGroups;
    }
}
