<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\ProductManagerBundle\Service\ProductOptionService;

/**
 * Class ProductOptionController
 * @package Oni\ProductManagerBundle\Controller
 * @author peter.atkins85@gmail.com
 */
class ProductOptionController extends CoreController
{

    /**
     * @var ProductOptionService
     */
    private $productOptionService;

    public function __construct(ProductOptionService $productOptionService)
    {
        $this->productOptionService = $productOptionService;
    }

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
