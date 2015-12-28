<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 25/12/15
 * Time: 19:42
 */

namespace Cms\ProductManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cms\ProductManagerBundle\Entity\ProductCategory;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProductCategoryData extends AbstractFixture implements OrderedFixtureInterface ,FixtureInterface, ContainerAwareInterface
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

        $language = $this->getReference('language');
        $root = new ProductCategory();
        //$root->setTra
        $root->setProductCategoryName('rootCategory');
        $root->addDefinition($rootDef);

        $test = new ProductCategory();
        $testDef = new ProductCategoryDefinitions();
        $testDef->setProductCategoryName('Test');
        $testDef->setLanguage($this->getReference('language'));
        $test->setParent($root);
        $test->addDefinition($testDef);

        $em = $this->container->get('doctrine.orm.default_entity_manager');

        $em->persist($root);
        $em->persist($test);

        $em->flush();

    }

    public function getOrder()
    {
        return 3;
    }
}
