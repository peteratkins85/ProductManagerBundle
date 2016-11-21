<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use Oni\CoreBundle\Doctrine\Spec\OrX;
use Oni\CoreBundle\Doctrine\Spec\Specification;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;

/**
 * Class ProductCategoryDataTable
 * @package Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory
 * @author peter.atkins85@gmail.com
 */
class ProductCategoryDataTable implements Specification
{

    /**
     * @var Specification
     */
    protected $spec;

    protected $fields = [
        'pc.id',
        'pc.productCategoryName',
        'pc.productCategoryUrl'
    ];

    /**
     * ProductCategoryDataTable constructor.
     * @param $search
     * @param int $limit
     * @param bool $getRecordCount
     */
    public function __construct($search, int $limit = 0, bool $getRecordCount = false)
    {
        if ($search) {
            $this->spec = new AsArrayLimit(
                new OrX(
                    new NameContains($search),
                    new IdEquals($search)
                )
            );
        }else{
            $this->spec = new AsArrayLimit();
        }

        if ($getRecordCount) {
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
        $qb->select($this->fields);

        return $this->spec->match($qb, $dqlAlias);
    }

    /**
     * @param Query $query
     */
    public function modifyQuery(Query $query)
    {
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