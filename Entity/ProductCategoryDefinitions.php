<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryDefinitions
 *
 * @ORM\Table(name="oni_product_category_definitions", uniqueConstraints={@ORM\UniqueConstraint(name="language_category", columns={"languageId", "productCategoryId"})})
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductCategoryDefinitionsRepository")
 */
class ProductCategoryDefinitions
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
     * @ORM\Column(name="productCategoryId", type="integer")
     */
    private $productCategoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="languageId", type="integer")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="productCategoryName", type="string", length=255)
     */
    private $productCategoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string")
     */
    private $language;



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
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     *
     * @return ProductCategoryDefinitions
     */
    public function setProductCategoryId($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;

        return $this;
    }

    /**
     * Get productCategoryId
     *
     * @return integer
     */
    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     *
     * @return ProductCategoryDefinitions
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set productCategoryName
     *
     * @param string $productCategoryName
     *
     * @return ProductCategoryDefinitions
     */
    public function setProductCategoryName($productCategoryName)
    {
        $this->productCategoryName = $productCategoryName;

        return $this;
    }

    /**
     * Get productCategoryName
     *
     * @return string
     */
    public function getProductCategoryName()
    {
        return $this->productCategoryName;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return ProductCategoryDefinitions
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
