<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionGroupTypes
 *
 * @ORM\Table(name="oni_product_option_group_types")
 * @ORM\Entity
 */
class ProductOptionGroupType
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
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroup", mappedBy="optionGroupType")
     */
    private $productOptionGroups;

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
     * Add productOptionGroup
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup
     *
     * @return ProductOptionGroupType
     */
    public function addProductOptionGroup(\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup)
    {
        $this->productOptionGroups[] = $productOptionGroup;

        return $this;
    }

    /**
     * Remove productOptionGroup
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup
     */
    public function removeProductOptionGroup(\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup)
    {
        $this->productOptionGroups->removeElement($productOptionGroup);
    }

    /**
     * Get productOptionGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductOptionGroups()
    {
        return $this->productOptionGroups;
    }
}
