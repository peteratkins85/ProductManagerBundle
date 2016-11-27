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
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions;
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

        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $root = new ProductCategory();
        $root->setName('rootCategory');
        $root->setUrl('root-category-url');
        $root->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus lorem. Nulla pharetra felis urna. Donec et dignissim lorem, ac condimentum ante. Proin dictum neque elit, eu condimentum neque condimentum vitae.');
        $root->setMetaTitle('root title');

        $repository = $em->getRepository('Gedmo\\Translatable\\Entity\\Translation');
        $repository->translate($root, 'name', 'en', 'rootCategory')
                   ->translate($root, 'name', 'de', 'rootCategory de')
        ;

        $test = new ProductCategory();
        $test->setParent($root);
        $test->setName('Test');
        $test->setUrl('test-url');
        $test->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus lorem. Nulla pharetra felis urna. Donec et dignissim lorem, ac condimentum ante. Proin dictum neque elit, eu condimentum neque condimentum vitae.');
        $test->setMetaTitle('test title');


        $repository->translate($test, 'name', 'en', 'Test')
                   ->translate($test, 'name', 'de', 'Test de')
        ;

        $em->persist($root);
        $em->persist($test);
        $em->flush();

    }

    public function getOrder()
    {
        return 3;
    }
}
