<?php
namespace App\Oni\ProductManagerBundle\EventListeners;

use App\Oni\ProductManagerBundle\ProductEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Oni\ProductManagerBundle\Events\ProductEvent;

class ProductEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            ProductEvents::PRODUCT_LIST  => array('onProductListing', 0),
        );
    }

    public function onProductListing(ProductEvent $event)
    {
        $event->newVar = 'ddd';
    }
}