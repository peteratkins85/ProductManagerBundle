<?php

namespace App\Oni\ProductManagerBundle\Entity;

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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

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
     * Add productOptionGroup
     *
     * @param \App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup
     *
     * @return ProductOptionGroupType
     */
    public function addProductOptionGroup(\App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup)
    {
        $this->productOptionGroups[] = $productOptionGroup;

        return $this;
    }

    /**
     * Remove productOptionGroup
     *
     * @param \App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup
     */
    public function removeProductOptionGroup(\App\Oni\ProductManagerBundle\Entity\ProductOptionGroup $productOptionGroup)
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ProductOptionGroupType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
