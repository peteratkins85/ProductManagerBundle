<?php

namespace App\Oni\ProductManagerBundle\Doctrine\Spec\Product;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Oni\CoreBundle\Doctrine\Spec\Specification;

class SkuEquals implements Specification
{

    /**
     * @var string
     */
    private $sku;

    /**
     * NameContains constructor.
     * @param $sku
     */
    public function __construct($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param \Doctrine\ORM\QueryBuilder $qb
     * @param string $dqlAlias
     *
     * @return \Doctrine\ORM\Query\Expr
     */
    public function match(QueryBuilder $qb, $dqlAlias)
    {
        $qb->setParameter('sku',  $this->sku);

        return $qb->expr()->eq($dqlAlias . '.sku  ', ':sku');
    }

    /**
     * @param \Doctrine\ORM\Query $query
     ***/
    public function modifyQuery(Query $query)
    {
    }

}