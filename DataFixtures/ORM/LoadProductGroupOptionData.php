<?php

namespace App\Oni\ProductManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Oni\ProductManagerBundle\Entity\Product;
use App\Oni\ProductManagerBundle\Entity\ProductCategory;
use App\Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use App\Oni\ProductManagerBundle\Entity\ProductOption;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroupType;
use App\Oni\ProductManagerBundle\Entity\ProductPrices;
use App\Oni\ProductManagerBundle\Entity\ProductType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProductGroupOptionData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
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

        $optionGroupType1 = new ProductOptionGroupType();
        $optionGroupType1->setName('Size');

        $optionGroupType2 = new ProductOptionGroupType();
        $optionGroupType2->setName('Colour');
        $colourOptions = [];

        $groupOption1 = new ProductOptionGroup();
        $groupOption1->setName('T-Shirt Sizes');
        $groupOption1->setOptionGroupType($optionGroupType1);
        $groupOption1->setDataType(ProductOptionGroup::SELECT);
        $groupOption1->setUserOptionSelectType(ProductOptionGroup::SELECT);

        $option1 = new ProductOption();
        $option1->setOptionPriority(0);
        $option1->setOptionValue('XXS');

        $option2 = new ProductOption();
        $option2->setOptionPriority(1);
        $option2->setOptionValue('XS');

        $option3 = new ProductOption();
        $option3->setOptionPriority(2);
        $option3->setOptionValue('S');

        $option4 = new ProductOption();
        $option4->setOptionPriority(3);
        $option4->setOptionValue('M');

        $option5 = new ProductOption();
        $option5->setOptionPriority(4);
        $option5->setOptionValue('L');

        $option6 = new ProductOption();
        $option6->setOptionPriority(5);
        $option6->setOptionValue('XL');

        $option7 = new ProductOption();
        $option7->setOptionPriority(6);
        $option7->setOptionValue('XXL');

        $groupOption1->addOption($option1);
        $groupOption1->addOption($option2);
        $groupOption1->addOption($option3);
        $groupOption1->addOption($option4);
        $groupOption1->addOption($option5);
        $groupOption1->addOption($option6);
        $groupOption1->addOption($option7);

        $groupOption2 = new ProductOptionGroup();
        $groupOption2->setName('Colours');
        $groupOption2->setOptionGroupType($optionGroupType2);
        $groupOption2->setDataType(ProductOptionGroup::SELECT);
        $groupOption2->setUserOptionSelectType(ProductOptionGroup::SELECT);

        $i = 0;

        foreach ($this->getColours() as $colour) {
            $colourOptions[$colour] = new ProductOption();
            $colourOptions[$colour]->setOptionPriority(0);
            $colourOptions[$colour]->setOptionValue($colour);

            $groupOption2->addOption($colourOptions[$colour]);
            $i++;
        }

        $em->persist($groupOption1);
        $em->persist($groupOption2);
        $em->flush();

        $this->setReference('T-Shirt-Group', $groupOption1);
        $this->setReference('T-Shirt-sizeXXS', $option1);
        $this->setReference('T-Shirt-sizeXS', $option2);
        $this->setReference('T-Shirt-sizeS', $option3);
        $this->setReference('T-Shirt-sizeM', $option4);
        $this->setReference('T-Shirt-sizeL', $option5);
        $this->setReference('T-Shirt-sizeXL', $option6);
        $this->setReference('T-Shirt-sizeXXL', $option7);
    }

    public function getColours()
    {
        return ["AliceBlue", "AntiqueWhite", "Aqua", "Aquamarine", "Azure", "Beige", "Bisque", "Black", "BlanchedAlmond", "Blue", "BlueViolet", "Brown", "BurlyWood", "CadetBlue", "Chartreuse", "Chocolate", "Coral", "CornflowerBlue", "Cornsilk", "Crimson", "Cyan", "DarkBlue", "DarkCyan", "DarkGoldenRod", "DarkGray", "DarkGrey", "DarkGreen", "DarkKhaki", "DarkMagenta", "DarkOliveGreen", "Darkorange", "DarkOrchid", "DarkRed", "DarkSalmon", "DarkSeaGreen", "DarkSlateBlue", "DarkSlateGray", "DarkSlateGrey", "DarkTurquoise", "DarkViolet", "DeepPink", "DeepSkyBlue", "DimGray", "DimGrey", "DodgerBlue", "FireBrick", "FloralWhite", "ForestGreen", "Fuchsia", "Gainsboro", "GhostWhite", "Gold", "GoldenRod", "Gray", "Grey", "Green", "GreenYellow", "HoneyDew", "HotPink", "IndianRed", "Indigo", "Ivory", "Khaki", "Lavender", "LavenderBlush", "LawnGreen", "LemonChiffon", "LightBlue", "LightCoral", "LightCyan", "LightGoldenRodYellow", "LightGray", "LightGrey", "LightGreen", "LightPink", "LightSalmon", "LightSeaGreen", "LightSkyBlue", "LightSlateGray", "LightSlateGrey", "LightSteelBlue", "LightYellow", "Lime", "LimeGreen", "Linen", "Magenta", "Maroon", "MediumAquaMarine", "MediumBlue", "MediumOrchid", "MediumPurple", "MediumSeaGreen", "MediumSlateBlue", "MediumSpringGreen", "MediumTurquoise", "MediumVioletRed", "MidnightBlue", "MintCream", "MistyRose", "Moccasin", "NavajoWhite", "Navy", "OldLace", "Olive", "OliveDrab", "Orange", "OrangeRed", "Orchid", "PaleGoldenRod", "PaleGreen", "PaleTurquoise", "PaleVioletRed", "PapayaWhip", "PeachPuff", "Peru", "Pink", "Plum", "PowderBlue", "Purple", "Red", "RosyBrown", "RoyalBlue", "SaddleBrown", "Salmon", "SandyBrown", "SeaGreen", "SeaShell", "Sienna", "Silver", "SkyBlue", "SlateBlue", "SlateGray", "SlateGrey", "Snow", "SpringGreen", "SteelBlue", "Tan", "Teal", "Thistle", "Tomato", "Turquoise", "Violet", "Wheat", "White", "WhiteSmoke", "Yellow", "YellowGreen"];
    }

    public function getOrder()
    {
        return 4;
    }
}
