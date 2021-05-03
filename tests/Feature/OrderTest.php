<?php

namespace Tests\Feature;

use App\Models\Orders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{

    /** @test */
    public function listPayments() {
        $response = $this->get('order/list');
        $response->assertOk();
    }


    /** @test */
    public function saveOrder()
    {
        $response = $this->post('/order/create', [
            'customer_name' => 'prueba',
            'customer_email' => 'prueba@prueba.com',
            'customer_mobile' => '+573235852122',
            'customer_address' => 'direccion',
            'customer_document' => '135655358',
            'customer_type_document' => 'CC',
            'session' => '3866',
            'reference' => 'fSdFSDfsdfSdfs',
            'product_id' => '2',
            'status' => 'CREATED',
            'url' => 'http://url.com',
            'expired_date' => '2021/05/04 00:00:00',
        ]);

        // $response->assertOk();
        $data = Orders::where('reference','fSdFSDfsdfSdfs')->first();
        $response->assertCreated();
    }
}
