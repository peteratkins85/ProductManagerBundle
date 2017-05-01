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

class LoadProductCategoryData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
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
            ->translate($root, 'name', 'fr', 'rootCategory');

        $cat1 = new ProductCategory();
        $cat1->setParent($root);
        $cat1->setName('Sports & Outdoors');
        $cat1->setUrl('sports-and-outdoors');
        $cat1->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus lorem. Nulla pharetra felis urna. Donec et dignissim lorem, ac condimentum ante. Proin dictum neque elit, eu condimentum neque condimentum vitae.');
        $cat1->setMetaTitle('Sports & Outdoors');


        $repository->translate($cat1, 'name', 'en', 'Sports & Outdoors')
            ->translate($cat1, 'name', 'fr', 'Sports et plein air');


        $cat2 = new ProductCategory();
        $cat2->setParent($root);
        $cat2->setName('Books');
        $cat2->setUrl('books');
        $cat2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus lorem. Nulla pharetra felis urna. Donec et dignissim lorem, ac condimentum ante. Proin dictum neque elit, eu condimentum neque condimentum vitae.');
        $cat2->setMetaTitle('Books');


        $repository->translate($cat2, 'name', 'en', 'Books')
            ->translate($cat2, 'name', 'fr', 'Livres');

        $cat3 = new ProductCategory();
        $cat3->setParent($root);
        $cat3->setName('Electronics & Computers');
        $cat3->setUrl('electronics-and-computers');
        $cat3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet cursus lorem. Nulla pharetra felis urna. Donec et dignissim lorem, ac condimentum ante. Proin dictum neque elit, eu condimentum neque condimentum vitae.');
        $cat3->setMetaTitle('Electronics & Computers');


        $repository->translate($cat3, 'name', 'en', 'Electronics & Computers')
            ->translate($cat3, 'name', 'fr', 'Électronique et ordinateurs');

        $em->persist($root);
        $em->persist($cat1);
        $em->persist($cat2);
        $em->persist($cat3);
        $em->flush();

        $this->addReference('rootCategory', $root);
        $this->addReference('Cat1', $cat1);
        $this->addReference('Cat2', $cat2);
        $this->addReference('Cat3', $cat3);
    }

    public function getOrder()
    {
        return 3;
    }
}
