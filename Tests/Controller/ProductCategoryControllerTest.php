<?php

namespace App\Oni\ProductManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductCategoryControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product/category/add');
    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product/categories');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'product/category/edit');
    }

}
