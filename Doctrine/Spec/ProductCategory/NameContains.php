<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\Specification;

class NameContains implements Specification {

    /**
     * @var string
     */
    private $productCategoryName;

    public function __construct($productCategoryName)
    {
        $this->productCategoryName = $productCategoryName;
    }

    /**
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @param string $dqlAlias
     *
     * @return \Doctrine\ORM\Query\Expr
     */
    public function match( QueryBuilder $qb, $dqlAlias )
    {
        $qb->setParameter('name', '%'.$this->productCategoryName.'%');

        return $qb->expr()->like($dqlAlias . '.productCategoryName', ':name');
    }

    /**
     * @param \Doctrine\ORM\Query $query
     ***/
    public function modifyQuery( Query $query ) { /* empty ***/ }

}