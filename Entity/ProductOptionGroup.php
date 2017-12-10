<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oni\CoreBundle\Entity\Traits\LastUserEntity;
use Oni\CoreBundle\Entity\Traits\TimestampableEntity;

/**
 * ProductOptionGroups
 *
 * @ORM\Table(name="oni_product_option_groups")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupRepository")
 */
class ProductOptionGroup
{

    use TimestampableEntity;
    use LastUserEntity;

    const SELECT = 'SELECT';
    const MULTI_SELECT = 'MULTI_SELECT';
    const TEXT = 'TEXT';

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
     * @ORM\Column(name="dataType", type="string", length=20, nullable=true)
     */
    private $dataType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="userOptionSelectType", type="string", length=30, nullable=true)
     */
    private $userOptionSelectType;

    /**
     * @var \Oni\ProductManagerBundle\Entity\ProductOptionGroupType
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroupType", inversedBy="productOptionGroups", cascade={"persist"}))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optionGroupTypeId", referencedColumnName="id")
     * })
     */
    private $optionGroupType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Oni\ProductManagerBundle\Entity\ProductOption", mappedBy="optionGroup", cascade={"persist"}))
     */
    private $options;


    /**
     * @var array
     */
    public static $dataTypes = [
        self::SELECT,
        self::MULTI_SELECT,
        self::TEXT,
    ];



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dataType
     *
     * @param string $dataType
     *
     * @return ProductOptionGroup
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ProductOptionGroup
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
     * Set userOptionSelectType
     *
     * @param string $userOptionSelectType
     *
     * @return ProductOptionGroup
     */
    public function setUserOptionSelectType($userOptionSelectType)
    {
        $this->userOptionSelectType = $userOptionSelectType;

        return $this;
    }

    /**
     * Get userOptionSelectType
     *
     * @return string
     */
    public function getUserOptionSelectType()
    {
        return $this->userOptionSelectType;
    }

    /**
     * Set optionGroupType
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroupType $optionGroupType
     *
     * @return ProductOptionGroup
     */
    public function setOptionGroupType(\Oni\ProductManagerBundle\Entity\ProductOptionGroupType $optionGroupType = null)
    {
        $this->optionGroupType = $optionGroupType;

        return $this;
    }

    /**
     * Get optionGroupType
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductOptionGroupType
     */
    public function getOptionGroupType()
    {
        return $this->optionGroupType;
    }

    /**
     * Add option
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOption $option
     *
     * @return ProductOptionGroup
     */
    public function addOption(\Oni\ProductManagerBundle\Entity\ProductOption $option)
    {
        $option->setOptionGroup($this);
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOption $option
     */
    public function removeOption(\Oni\ProductManagerBundle\Entity\ProductOption $option)
    {
        $this->options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }
}
