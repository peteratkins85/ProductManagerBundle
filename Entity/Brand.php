<?php

namespace App\Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="oni_brand")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Repository\BrandRepository")
 */
class Brand
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="logoImageId", type="integer", nullable=true)
     */
    private $logoImageId;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, unique=true)
     */
    private $url;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\Product", mappedBy="brand")
     */
    private $products;

    /**
     * Get id
     *
     * @return int
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
     * @return Brand
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
     * Set logoImageId
     *
     * @param integer $logoImageId
     *
     * @return Brand
     */
    public function setLogoImageId($logoImageId)
    {
        $this->logoImageId = $logoImageId;

        return $this;
    }

    /**
     * Get logoImageId
     *
     * @return int
     */
    public function getLogoImageId()
    {
        return $this->logoImageId;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Brand
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Brand
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \App\Oni\ProductManagerBundle\Entity\Product $product
     *
     * @return Brand
     */
    public function addProduct(\App\Oni\ProductManagerBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \App\Oni\ProductManagerBundle\Entity\Product $product
     */
    public function removeProduct(\App\Oni\ProductManagerBundle\Entity\Product $product)
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
}
