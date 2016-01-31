<?php

namespace Oni\ProductManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product/add');
    }

    public function testProduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'product/edit');
    }

}
