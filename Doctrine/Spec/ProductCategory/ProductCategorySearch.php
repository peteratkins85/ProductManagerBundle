<?php

namespace App\Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\CoreBundle\Common\LocaleAwareInterface;
use App\Oni\CoreBundle\Doctrine\Spec\AndX;
use App\Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use App\Oni\CoreBundle\Doctrine\Spec\Common\IdEquals;
use App\Oni\CoreBundle\Doctrine\Spec\Common\NameContains;
use App\Oni\CoreBundle\Doctrine\Spec\LocaleTrait;
use App\Oni\CoreBundle\Doctrine\Spec\OrX;
use App\Oni\CoreBundle\Doctrine\Spec\SingleScalar;
use App\Oni\CoreBundle\Doctrine\Spec\Specification;
use App\Oni\CoreBundle\Doctrine\Spec\Traits;
use App\Oni\ProductManagerBundle\Entity\ProductCategory;
use App\Oni\CoreBundle\Doctrine\Spec\DataFilterTrait;

/**
 * Class ProductCategoryDataTable
 * @package Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory
 * @author peter.atkins85@gmail.com
 */
class ProductCategorySearch implements Specification, LocaleAwareInterface
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
        '{alias}.url',
        'pcp.name as parent',
        '{alias}.updatedBy',
        '{alias}.updatedAt'
    ];

    /**
     * ProductCategoryDataTable constructor.
     * @param
     */
    public function __construct($params)
    {

        $this->setFilters($params);
        $queryClass = new AndX(
            new OrX(
                new NameContains($this->search),
                new IdEquals($this->search)
            ),
            new NotRootCategory()
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
                    new NotRootCategory(),
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
                    new NotRootCategory()
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
        $qb->select($this->fields)
            ->innerJoin(
            'ProductManagerBundle:ProductCategory',
            'pcp',
            \Doctrine\ORM\Query\Expr\Join::WITH,
            $dqlAlias . '.parentId = pcp.id'
        );

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
        return ($className === ProductCategory::class);
    }

}