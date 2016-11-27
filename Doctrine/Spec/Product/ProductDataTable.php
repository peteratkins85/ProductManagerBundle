<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Common\DataTable;
use Oni\CoreBundle\Doctrine\Spec\AndX;
use Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use Oni\CoreBundle\Doctrine\Spec\OrX;
use Oni\CoreBundle\Doctrine\Spec\SingleScalar;
use Oni\CoreBundle\Doctrine\Spec\Specification;
use Oni\CoreBundle\Doctrine\Spec\SpecificationTraits;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\CoreBundle\Doctrine\Spec\DataTableSpecificationTrait;

/**
 * Class ProductCategoryDataTable
 * @package Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory
 * @author peter.atkins85@gmail.com
 */
class ProductDataTable implements Specification
{

    use SpecificationTraits;
    use DataTableSpecificationTrait;

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
    ];

    /**
     * ProductCategoryDataTable constructor.
     * @param $config array
     *        $config['getRecordCount'] boolean
     *        $config['locale'] string   e.g. FR|EN|DE
     * @param DataTable $dataTable
     */
    public function __construct($config, DataTable $dataTable)
    {

        if (empty($config['locale'])) {
            throw new \InvalidArgumentException('Error: locale is either not set or invalid');
        }
        $this->dataTable = $dataTable;
        $this->locale = $config['locale'];
        $this->setup($config);

        $queryClass = new AndX(
            new OrX(
                new NameContains($this->dataTable->getSearch()),
                new IdEquals($this->dataTable->getSearch())
            ),
            new NotRootCategory()
        );

        if (!$this->getRecordCount) {

            if ($this->dataTable->getSearch()) {
                $this->spec = new AsArrayLimit(
                    $queryClass,
                    $this->dataTable->getLength(),
                    $this->dataTable->getStart()
                );
            } else {
                $this->spec = new AsArrayLimit(
                    new NotRootCategory(),
                    $this->dataTable->getLength(),
                    $this->dataTable->getStart()
                );
            }

        } else {

            if ($this->dataTable->getSearch() && $this->includeFilter) {

                $this->spec = new SingleScalar(
                    $queryClass
                );

            } else {
                $this->spec = new SingleScalar(
                    new NotRootCategory()
                );
            }

            $this->fields = [
                'count(pc.id) as total'
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