<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * ProductCategory
 *
 * @ORM\Table(name="oni_product_categories",
 *     uniqueConstraints={@UniqueConstraint(name="search_idx", columns={"productCategoryName"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository")
 * @Gedmo\TranslationEntity(class="Oni\ProductManagerBundle\Entity\ProductCategoryTranslations")
 * @Gedmo\Tree(type="nested")
 */
class ProductCategory
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
     * @Gedmo\Translatable
     * @ORM\Column(name="productCategoryName", type="string", length=255)
     */
    private $productCategoryName;

    /**
     * @var string
     * @ORM\Column(name="productCategoryUrl", type="string", length=255)
     */
    private $productCategoryUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     *
     * @var boolean
     * @ORM\Column(name="viewable",type="boolean")
     *
     */
    private $viewable = 1;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="description" , type="string", length=255 , nullable=true)
     *
     */
    private $description;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="metaTitle" , type="string", length=255, nullable=true)
     *
     */
    private $metaTitle;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="metaDescription" , type="string", length=255, nullable=true)
     *
     */
    private $metaDescription;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="metaKeyWords" , type="string", length=255, nullable=true)
     *
     */
    private $metaKeyWords;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="modifiedBy", type="integer", nullable=true)
     */
    private $modifiedBy;

    /**
     * @var integer
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @var integer
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @var integer
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @var integer
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\ProductCategory", mappedBy="parent")
     * @ORM\OrderBy({
     *     "lft"="ASC"
     * })
     */
    private $children;

    /**
     * @var \Oni\ProductManagerBundle\Entity\ProductCategory
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductCategory", inversedBy="children")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentId", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
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
     * Set productCategoryName
     *
     * @param string $productCategoryName
     *
     * @return ProductCategory
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ProductCategory
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return ProductCategory
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     *
     * @return ProductCategory
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return integer
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return ProductCategory
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return ProductCategory
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     *
     * @return ProductCategory
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return ProductCategory
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Add child
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductCategory $child
     *
     * @return ProductCategory
     */
    public function addChild(\Oni\ProductManagerBundle\Entity\ProductCategory $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductCategory $child
     */
    public function removeChild(\Oni\ProductManagerBundle\Entity\ProductCategory $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductCategory $parent
     *
     * @return ProductCategory
     */
    public function setParent(\Oni\ProductManagerBundle\Entity\ProductCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set productCategoryUrl
     *
     * @param string $productCategoryUrl
     *
     * @return ProductCategory
     */
    public function setProductCategoryUrl($productCategoryUrl)
    {
        $this->productCategoryUrl = $productCategoryUrl;

        return $this;
    }

    /**
     * Get productCategoryUrl
     *
     * @return string
     */
    public function getProductCategoryUrl()
    {
        return $this->productCategoryUrl;
    }




    /**
     * Set description
     *
     * @param string $description
     *
     * @return ProductCategory
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
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return ProductCategory
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return ProductCategory
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeyWords
     *
     * @param string $metaKeyWords
     *
     * @return ProductCategory
     */
    public function setMetaKeyWords($metaKeyWords)
    {
        $this->metaKeyWords = $metaKeyWords;

        return $this;
    }

    /**
     * Get metaKeyWords
     *
     * @return string
     */
    public function getMetaKeyWords()
    {
        return $this->metaKeyWords;
    }

    /**
     * Set viewable
     *
     * @param boolean $viewable
     *
     * @return ProductCategory
     */
    public function setViewable($viewable)
    {
        $this->viewable = $viewable;

        return $this;
    }

    /**
     * Get viewable
     *
     * @return boolean
     */
    public function getViewable()
    {
        return $this->viewable;
    }
}
