<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryTranslations
 *
 * @ORM\Table(name="oni_product_category_translations", indexes={@ORM\Index(name="oni_product_category_index", columns={"locale", "object_class", "field", "foreign_key"})})
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductCategoryTranslationsRepository")
 */
class ProductCategoryTranslations
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
     * @ORM\Column(name="locale", type="string", length=8)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="object_class", type="string", length=255)
     */
    private $objectClass;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=32)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="foreign_key", type="string", length=64)
     */
    private $foreignKey;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;



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
     * Set locale
     *
     * @param string $locale
     *
     * @return ProductCategoryTranslations
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set objectClass
     *
     * @param string $objectClass
     *
     * @return ProductCategoryTranslations
     */
    public function setObjectClass($objectClass)
    {
        $this->objectClass = $objectClass;

        return $this;
    }

    /**
     * Get objectClass
     *
     * @return string
     */
    public function getObjectClass()
    {
        return $this->objectClass;
    }

    /**
     * Set field
     *
     * @param string $field
     *
     * @return ProductCategoryTranslations
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set foreignKey
     *
     * @param string $foreignKey
     *
     * @return ProductCategoryTranslations
     */
    public function setForeignKey($foreignKey)
    {
        $this->foreignKey = $foreignKey;

        return $this;
    }

    /**
     * Get foreignKey
     *
     * @return string
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return ProductCategoryTranslations
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
