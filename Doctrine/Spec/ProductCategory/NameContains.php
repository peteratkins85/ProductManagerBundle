<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\Specification;

class NameContains implements Specification {

    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @param string $dqlAlias
     *
     * @return \Doctrine\ORM\Query\Expr
     */
    public function match( QueryBuilder $qb, $dqlAlias )
    {
        $qb->setParameter('name', '%'.$this->name.'%');

        return $qb->expr()->like($dqlAlias . '.name', ':name');
    }

    /**
     * @param \Doctrine\ORM\Query $query
     ***/
    public function modifyQuery( Query $query ) { /* empty ***/ }

}