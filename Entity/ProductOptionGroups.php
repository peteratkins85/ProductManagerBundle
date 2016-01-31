<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOptionGroups
 *
 * @ORM\Table(name="product_option_groups")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupsRepository")
 */
class ProductOptionGroups
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
     * @ORM\Column(name="dataType", type="string", length=20)
     */
    private $dataType;

    /**
     * @var integer
     *
     * @ORM\Column(name="optionGroupTypeId", type="integer")
     */
    private $optionGroupTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="userOptionSelectType", type="string", length=30)
     */
    private $userOptionSelectType;

    /**
     * @var integer
     *
     * @ORM\Column(name="productCategoryId", type="integer")
     */
    private $productCategoryId;



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
     * @return ProductOptionGroups
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
     * Set optionGroupTypeId
     *
     * @param integer $optionGroupTypeId
     *
     * @return ProductOptionGroups
     */
    public function setOptionGroupTypeId($optionGroupTypeId)
    {
        $this->optionGroupTypeId = $optionGroupTypeId;

        return $this;
    }

    /**
     * Get optionGroupTypeId
     *
     * @return integer
     */
    public function getOptionGroupTypeId()
    {
        return $this->optionGroupTypeId;
    }

    /**
     * Set userOptionSelectType
     *
     * @param string $userOptionSelectType
     *
     * @return ProductOptionGroups
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
     * Set productCategoryId
     *
     * @param integer $productCategoryId
     *
     * @return ProductOptionGroups
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
}
