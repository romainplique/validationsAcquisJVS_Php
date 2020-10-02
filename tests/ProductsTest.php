<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllProducts()
    {
        $this->get('/api/products');
        $this->assertNotNull($this->response->getContent());
    }

    public function testGetProduct()
    {
        $this->get('/api/products/21');
        $this->assertNotNull($this->response->getContent());
    }

    // public function testGetProduct500()
    // {
    //     $this->get('/api/products/-21');
    //     $this->expectException(InvalidArgumentException::class);
    // }

    // public function testCreateProduct()
    // {
    //     $this->post('/api/products/');
    // }

    // public function testUpdateProduct()
    // {
    // }

    // public function testDeleteProduct()
    // {
    // }
}
