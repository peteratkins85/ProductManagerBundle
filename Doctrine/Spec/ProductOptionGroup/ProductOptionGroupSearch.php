<?php

namespace App\Oni\ProductManagerBundle\Doctrine\Spec\ProductOptionGroup;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\CoreBundle\Common\LocaleAwareInterface;
use App\Oni\CoreBundle\Doctrine\Spec\AndX;
use App\Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use App\Oni\CoreBundle\Doctrine\Spec\Common\FindAll;
use App\Oni\CoreBundle\Doctrine\Spec\Common\IdEquals;
use App\Oni\CoreBundle\Doctrine\Spec\Common\NameContains;
use App\Oni\CoreBundle\Doctrine\Spec\LocaleTrait;
use App\Oni\CoreBundle\Doctrine\Spec\OrX;
use App\Oni\CoreBundle\Doctrine\Spec\SingleScalar;
use App\Oni\CoreBundle\Doctrine\Spec\Specification;
use App\Oni\CoreBundle\Doctrine\Spec\Traits;
use App\Oni\ProductManagerBundle\Entity\ProductCategory;
use App\Oni\CoreBundle\Doctrine\Spec\DataFilterTrait;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroupType;

/**
 * Class ProductCategoryDataTable
 * @package Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory
 * @author peter.atkins85@gmail.com
 */
class ProductOptionGroupSearch implements Specification, LocaleAwareInterface
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
        'pogt.name as optionGroupType',
        '{alias}.updatedBy',
        '{alias}.updatedAt',
        '{alias}.createdAt'
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
            )
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
                    new FindAll(),
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
                    new FindAll()
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
            ProductOptionGroupType::class,
            'pogt',
            \Doctrine\ORM\Query\Expr\Join::WITH,
            $dqlAlias . '.optionGroupType = pogt.id'
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
        return ($className === ProductOptionGroup::class);
    }

}