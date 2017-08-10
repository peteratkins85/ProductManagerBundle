<?php

namespace Oni\ProductManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Oni\ProductManagerBundle\Entity\ProductPrices;
use Oni\ProductManagerBundle\Entity\ProductType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProductTypeData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
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
        $em = $this->container->get('doctrine.orm.default_entity_manager');

        $typeOne = new ProductType();
        $typeOne->setName('Standard');
        $typeOne->setDescription('Singular product with no variants');
        $typeOne->setSafeName('STANDARD');
        $typeOne->setIcon('check');
        $typeOne->setVisible(1);

        $typeTwo = new ProductType();
        $typeTwo->setName('Virtual Product');
        $typeTwo->setDescription('Electronically delivered product');
        $typeTwo->setSafeName('VIRTUAL_PRODUCT');
        $typeTwo->setIcon('check');
        $typeTwo->setVisible(1);

        $typeThree = new ProductType();
        $typeThree->setName('Collection');
        $typeThree->setDescription('Product with one or more variations');
        $typeThree->setSafeName('COLLECTION');
        $typeThree->setIcon('bolt');
        $typeThree->setVisible(1);

        $em->persist($typeOne);
        $em->persist($typeTwo);
        $em->persist($typeThree);

        $em->flush();

        $this->addReference('StandardProductType', $typeOne);
        $this->addReference('VirtualProductType', $typeTwo);
        $this->addReference('CollectionProductType', $typeThree);
    }

    public function getOrder()
    {
        return 4;
    }
}
