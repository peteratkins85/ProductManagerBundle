<?php

namespace Cms\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * optionGroupTypes
 */
class ProductOptionGroupTypes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $optionType;


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
     * @return optionGroupTypes
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
     * @var \Doctrine\Common\Collections\Collection
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
     * Add optionGroups
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionGroups $optionGroups
     * @return optionGroupTypes
     */
    public function addOptionGroup(\Cms\ProductManagerBundle\Entity\ProductOptionGroups $optionGroups)
    {
        $this->optionGroups[] = $optionGroups;

        return $this;
    }

    /**
     * Remove optionGroups
     *
     * @param \Cms\ProductManagerBundle\Entity\ProductOptionGroups $optionGroups
     */
    public function removeOptionGroup(\Cms\ProductManagerBundle\Entity\ProductOptionGroups $optionGroups)
    {
        $this->optionGroups->removeElement($optionGroups);
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
