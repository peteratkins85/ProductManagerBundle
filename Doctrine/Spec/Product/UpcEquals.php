<?php

namespace App\Oni\ProductManagerBundle\Doctrine\Spec\Product;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Oni\CoreBundle\Doctrine\Spec\Specification;

class UpcEquals implements Specification
{

    /**
     * @var string
     */
    private $upc;

    /**
     * NameContains constructor.
     * @param $upc
     */
    public function __construct($upc)
    {
        $this->upc = $upc;
    }

    /**
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @param string $dqlAlias
     *
     * @return \Doctrine\ORM\Query\Expr
     */
    public function match(QueryBuilder $qb, $dqlAlias)
    {
        $qb->setParameter('upc',  $this->upc);

        return $qb->expr()->eq($dqlAlias . '.upc  ', ':upc');
    }

    /**
     * @param \Doctrine\ORM\Query $query
     ***/
    public function modifyQuery(Query $query)
    {
    }

}