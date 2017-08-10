<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\Product;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\AndX;
use Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use Oni\CoreBundle\Doctrine\Spec\Common\FindAll;
use Oni\CoreBundle\Doctrine\Spec\Common\IdEquals;
use Oni\CoreBundle\Doctrine\Spec\Common\NameContains;
use Oni\CoreBundle\Doctrine\Spec\DataFilterTrait;
use Oni\CoreBundle\Doctrine\Spec\LocaleTrait;
use Oni\CoreBundle\Doctrine\Spec\OrX;
use Oni\CoreBundle\Doctrine\Spec\SingleScalar;
use Oni\CoreBundle\Doctrine\Spec\Specification;
use Oni\CoreBundle\Doctrine\Spec\Traits;
use Oni\ProductManagerBundle\Entity\Product;

/**
 * Class ProductSearch
 * @package Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory
 */
class ProductSearch implements Specification
{

    use Traits;
    use DataFilterTrait;
    use LocaleTrait;

    /**
     * @var Specification
     */
    protected $spec;

    /**
     * @var array
     */
    protected $fields = [
        '{alias}.id',
        '{alias}.name',
        '{alias}.sku',
        '{alias}.upc',
        '{alias}.productTypeId',
        '{alias}.enabled',
        '{alias}.createdAt',
        '{alias}.updatedAt',
    ];


    public function __construct($params)
    {

        $this->setFilters($params);

        $queryClass = new AndX(
            new OrX(
                new NameContains($this->search),
                new IdEquals($this->search),
                new UpcEquals($this->search),
                new SkuEquals($this->search)
            ),
            new IsNotVariant()
        );

        if (!$this->getRecordCount) {

            if ($this->search) {
                $this->spec = new AsArrayLimit(
                    $queryClass,
                    $this->limit,
                    $this->offset
                );
            } else {
                $this->spec = new AsArrayLimit(
                    new IsNotVariant(),
                    $this->limit,
                    $this->offset
                );
            }

        } else {

            if ($this->search && $this->includeFilterOnGetRecordCount) {

                $this->spec = new SingleScalar(
                    $queryClass
                );

            } else {
                $this->spec = new SingleScalar(
                    new IsNotVariant()
                );
            }

            $this->fields = [
                'count({alias}.id) as total'
            ];

        }

    }

    /**
     * @param QueryBuilder $qb
     * @param string $dqlAlias
     * @return Query\Expr
     */
    public function match(QueryBuilder $qb, $dqlAlias)
    {
        $this->addFieldAlias($dqlAlias);
        $qb->select($this->fields);

        if (!$this->getRecordCount) {
            $qb->orderBy(
                $this->orderBy,
                $this->order
            );
        }

        return $this->spec->match($qb, $dqlAlias);
    }

    /**
     * @param Query $query
     */
    public function modifyQuery(Query $query)
    {
        $query->setHint(
            \Doctrine\ORM\Query::HINT_CUSTOM_OUTPUT_WALKER,
            'Gedmo\\Translatable\\Query\\TreeWalker\\TranslationWalker'
        )->setHint(
            \Gedmo\Translatable\TranslatableListener::HINT_TRANSLATABLE_LOCALE,
            $this->locale
        )->setHint(
            \Gedmo\Translatable\TranslatableListener::HINT_FALLBACK,
            1
        );

        return $this->spec->modifyQuery($query);
    }

    /**
     * @param $className
     * @return bool
     */
    public function supports($className)
    {
        return ($className === Product::class);
    }

}