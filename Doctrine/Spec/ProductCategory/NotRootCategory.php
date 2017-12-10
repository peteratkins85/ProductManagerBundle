<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\Specification;

class NotRootCategory implements Specification
{

    /**
     * @param QueryBuilder $qb
     * @param string $dqlAlias
     * @return Query\Expr\Comparison
     */
    public function match(QueryBuilder $qb, $dqlAlias)
    {
        return $qb->expr()->neq($dqlAlias . '.lvl', 0);
    }

    /**
     * @param \Doctrine\ORM\Query $query
     ***/
    public function modifyQuery(Query $query)
    { /* empty ***/
    }

}