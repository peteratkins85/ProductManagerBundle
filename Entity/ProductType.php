<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * ProductType
 *
 * @ORM\Table(name="oni_product_type",
 *     uniqueConstraints={@UniqueConstraint(name="safe_name_idx", columns={"safeName"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductTypeRepository")
 */
class ProductType
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
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=15)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="safeName", type="string", length=15)
     */
    private $safeName;

    /**
     * @var
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\Product", mappedBy="productType")
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return ProductType
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ProductType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add product
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $product
     *
     * @return ProductType
     */
    public function addProduct(\Oni\ProductManagerBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Oni\ProductManagerBundle\Entity\Product $product
     */
    public function removeProduct(\Oni\ProductManagerBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set safeName
     *
     * @param string $safeName
     *
     * @return ProductType
     */
    public function setSafeName($safeName)
    {
        $this->safeName = $safeName;

        return $this;
    }

    /**
     * Get safeName
     *
     * @return string
     */
    public function getSafeName()
    {
        return $this->safeName;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return ProductType
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }



    /**
     * Set visible
     *
     * @param boolean $visible
     *
     * @return ProductType
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}
