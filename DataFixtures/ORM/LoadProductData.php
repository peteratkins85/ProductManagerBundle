<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 25/12/15
 * Time: 19:42
 */

namespace Oni\ProductManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Oni\ProductManagerBundle\Entity\ProductPrices;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
{


    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    public function load(ObjectManager $manager)
    {

//        $em = $this->container->get('doctrine.orm.default_entity_manager');
//
//        $price = new ProductPrices();
//        $price->setNowPrice('10.00');
//        $price->setCurrency($this->getReference('defaultCurrency'));
//        $price->getWholesalePrice('5.00');
//        $price->
//
//        $prod1 = new Product();
//        $prod1->setName('I Am Number 4');
//        $prod1->addCategory($this->getReference('Cat2'));
//        $prod1->addPrice();
//
//
//
//        $em->persist($cat3);
//        $em->flush();
//
//        $this->addReference('rootCategory', $root);
//        $this->addReference('Cat1', $cat1);
//        $this->addReference('Cat2', $cat2);
//        $this->addReference('Cat3', $cat3);
    }

    public function getOrder()
    {
        return 4;
    }
}
