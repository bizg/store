<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\ProductController;
use Tests\TestCase;

class ProductTest extends TestCase
{
        /** @test */
    public function listProducts() {
        $products = new ProductController();
        $list = $products->show();
        $this->assertCount(1, $list);
    }
}
