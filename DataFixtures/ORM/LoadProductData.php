<?php

namespace App\Oni\ProductManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Oni\ProductManagerBundle\Entity\Product;
use App\Oni\ProductManagerBundle\Entity\ProductCategory;
use App\Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use App\Oni\ProductManagerBundle\Entity\ProductOptionRelations;
use App\Oni\ProductManagerBundle\Entity\ProductPrices;
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

        $em = $this->container->get('doctrine.orm.default_entity_manager');

        $price = new ProductPrices();
        $price->setNowPrice('10.00');
        $price->setCurrency($this->getReference('defaultCurrency'));
        $price->setWholesalePrice('5.00');
        $price->setWasPrice('10.00');
        $price->setCurrency($this->getReference('defaultCurrency'));
        $price->setZone($this->getReference('ukZone'));

        $usPrice = new ProductPrices();
        $usPrice->setNowPrice('15.00');
        $usPrice->setCurrency($this->getReference('defaultCurrency'));
        $usPrice->setWholesalePrice('10.00');
        $usPrice->setWasPrice('15.00');
        $usPrice->setCurrency($this->getReference('USD'));
        $usPrice->setZone($this->getReference('usZone'));

        $globalPrice = new ProductPrices();
        $globalPrice->setNowPrice('25.00');
        $globalPrice->setCurrency($this->getReference('defaultCurrency'));
        $globalPrice->setWholesalePrice('15.00');
        $globalPrice->setWasPrice('25.00');
        $globalPrice->setCurrency($this->getReference('defaultCurrency'));
        $globalPrice->setZone($this->getReference('globalZone'));

        $prod1 = new Product();
        $prod1->setName('I Am Number 4');
        $prod1->setUrl('i-am-number-four');
        $prod1->addCategory($this->getReference('Cat2'));
        $prod1->setCondition('New');
        $prod1->addPrice($price);
        $prod1->addPrice($usPrice);
        $prod1->addPrice($globalPrice);
        $prod1->setDefaultProductCategory($this->getReference('Cat2'));
        $prod1->setUpc('1000000');
        $prod1->setSku('A400000');
        $prod1->setVisibility('1');
        $prod1->setSaleable(1);
        $prod1->setEnabled(1);
        $prod1->setDescription('Movie base on the Lorion Legacies book series');
        $prod1->setShortDescription('From Novel Lorion Legacies');
        $prod1->setProductType($this->getReference('StandardProductType'));

        $em->persist($prod1);
        $em->flush();

        $price2 = new ProductPrices();
        $price2->setNowPrice('10.00');
        $price2->setWholesalePrice('5.00');
        $price2->setWasPrice('10.00');
        $price2->setCurrency($this->getReference('defaultCurrency'));
        $price2->setZone($this->getReference('ukZone'));

        $usPrice2 = new ProductPrices();
        $usPrice2->setNowPrice('15.00');
        $usPrice2->setWholesalePrice('10.00');
        $usPrice2->setWasPrice('15.00');
        $usPrice2->setCurrency($this->getReference('USD'));
        $usPrice2->setZone($this->getReference('usZone'));

        $globalPrice2 = new ProductPrices();
        $globalPrice2->setNowPrice('25.00');
        $globalPrice2->setWholesalePrice('15.00');
        $globalPrice2->setWasPrice('25.00');
        $globalPrice2->setCurrency($this->getReference('defaultCurrency'));
        $globalPrice2->setZone($this->getReference('globalZone'));


        $prod2 = new Product();
        $prod2->setName('Star Wars T-Shirt');
        $prod2->setUrl('start-wars-t-shirt');
        $prod2->addCategory($this->getReference('Cat-Clothing'));
        $prod2->setCondition('New');
        $prod2->addPrice($price2);
        $prod2->addPrice($usPrice2);
        $prod2->addPrice($globalPrice2);
        $prod2->setDefaultProductCategory($this->getReference('Cat2'));
        $prod2->setUpc('1000005');
        $prod2->setSku('A400005');
        $prod2->setVisibility('1');
        $prod2->setSaleable(1);
        $prod2->setEnabled(1);
        $prod2->setDescription('An epic Star Wars T-Shirt');
        $prod2->setShortDescription('An epic Star Wars T-Shirt');
        $prod2->setProductType($this->getReference('CollectionProductType'));

        $em->persist($prod2);
        $em->flush();


        $optionRelation1 = new ProductOptionRelations();
        $optionRelation1->setOption($this->getReference('T-Shirt-sizeS'));

        $prod3 = new Product();
        $prod3->setName('Star Wars T-Shirt Small');
        $prod3->setUrl('start-wars-t-shirt-s');
        $prod3->addCategory($this->getReference('Cat-Clothing'));
        $prod3->setCondition('New');
        $prod3->setParentProduct($prod2);
        $prod3->addOptionRelation($optionRelation1);
        $prod3->setDefaultProductCategory($this->getReference('Cat2'));
        $prod3->setUpc('1000001');
        $prod3->setSku('A400001');
        $prod3->setVisibility('1');
        $prod3->setSaleable(1);
        $prod3->setEnabled(1);
        $prod3->setDescription('An epic Star Wars T-Shirt');
        $prod3->setShortDescription('An epic Star Wars T-Shirt');
        $prod3->setProductType($this->getReference('CollectionProductType'));

        $optionRelation2 = new ProductOptionRelations();
        $optionRelation2->setOption($this->getReference('T-Shirt-sizeXXS'));

        $em->persist($prod3);
        $em->flush();

        $prod4 = new Product();
        $prod4->setName('Star Wars T-Shirt XX Small');
        $prod4->setUrl('start-wars-t-shirt-xxs');
        $prod4->addCategory($this->getReference('Cat-Clothing'));
        $prod4->setCondition('New');
        $prod4->setParentProduct($prod2);
        $prod4->addOptionRelation($optionRelation2);
        $prod4->setDefaultProductCategory($this->getReference('Cat2'));
        $prod4->setUpc('1000002');
        $prod4->setSku('A400002');
        $prod4->setVisibility('1');
        $prod4->setSaleable(1);
        $prod4->setEnabled(1);
        $prod4->setDescription('An epic Star Wars T-Shirt');
        $prod4->setShortDescription('An epic Star Wars T-Shirt');
        $prod4->setProductType($this->getReference('CollectionProductType'));

        $em->persist($prod4);
        $em->flush();

        $optionRelation3 = new ProductOptionRelations();
        $optionRelation3->setOption($this->getReference('T-Shirt-sizeXS'));

        $prod5 = new Product();
        $prod5->setName('Star Wars T-Shirt X Small');
        $prod5->setUrl('start-wars-t-shirt-xs');
        $prod5->addCategory($this->getReference('Cat-Clothing'));
        $prod5->setCondition('New');
        $prod5->setParentProduct($prod2);
        $prod5->addOptionRelation($optionRelation3);
        $prod5->setDefaultProductCategory($this->getReference('Cat2'));
        $prod5->setUpc('1000003');
        $prod5->setSku('A400003');
        $prod5->setVisibility('1');
        $prod5->setSaleable(1);
        $prod5->setEnabled(1);
        $prod5->setDescription('An epic Star Wars T-Shirt');
        $prod5->setShortDescription('An epic Star Wars T-Shirt');
        $prod5->setProductType($this->getReference('CollectionProductType'));

        $em->persist($prod5);
        $em->flush();

    }

    public function getOrder()
    {
        return 5;
    }
}
