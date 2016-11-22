<?php

namespace Oni\ProductManagerBundle\Doctrine\Spec\ProductCategory;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Oni\CoreBundle\Doctrine\Spec\AndX;
use Oni\CoreBundle\Doctrine\Spec\AsArrayLimit;
use Oni\CoreBundle\Doctrine\Spec\AsObject;
use Oni\CoreBundle\Doctrine\Spec\OrX;
use Oni\CoreBundle\Doctrine\Spec\Specification;
use Oni\CoreBundle\SessionKeys;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @var array
     */
    protected $fields = [
        'pc.id',
        'pc.productCategoryName',
        'pc.productCategoryUrl'
    ];

    /**
     * @var string
     */
    protected $locale;

    /**
     * ProductCategoryDataTable constructor.
     * @param string $locale
     * @param null $search
     * @param int $limit
     * @param bool $getRecordCount
     */
    public function __construct(string $locale, $search = null, int $limit = 0, bool $getRecordCount = false)
    {
        $this->locale = $locale;

        if ($search) {
            $this->spec = new AsArrayLimit(
                new AndX(
                    new OrX(
                        new NameContains($search),
                        new IdEquals($search)
                    ),
                    new NotRootCategory()
                ),
                $limit
            );
        } else {
            $this->spec = new AsArrayLimit(
                new NotRootCategory(),
                $limit
            );
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
        $qb->andWhere($dqlAlias . '.lvl != 0');

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