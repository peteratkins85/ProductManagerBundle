<?php

namespace App\Oni\ProductManagerBundle\EventListeners;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig_Environment;

class TwigGlobals implements EventSubscriberInterface
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 18]],
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->addNavigationGlobal();
    }

    public function addNavigationGlobal()
    {
        $twigGlobals = $this->twig->getGlobals();
        if (!array_key_exists('oni_navigation_templates', $twigGlobals)
            || !array_key_exists('product-manager-navigation', $twigGlobals['oni_navigation_templates'])
        ) {
            $twigGlobals['oni_navigation_templates']['product-manager-navigation'] = '@ProductManager/navigation.html.twig';
        } else {
            $twigGlobals['oni_navigation_templates'] = [];
        }
        $this->twig->addGlobal('oni_navigation_templates', $twigGlobals['oni_navigation_templates']);
    }
}