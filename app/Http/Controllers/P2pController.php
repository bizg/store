<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class P2pController extends Controller
{
    private $placetopay;

    public function conexionToPay()
    {
        $this->placetopay = new \Dnetix\Redirection\PlacetoPay([
            'login' => env('P2P_LOGIN'),
            'tranKey' => env('P2P_TRANKEY'),
            'url' => env('P2P_URL'),
            'rest' => [
                'timeout' => 45,
                'connect_timeout' => 30,
            ]
        ]);

        return  $this->placetopay;
    }

    public function generatePayment($data,$reference,$buyer)
    {
        $request = [
            "buyer"=> [
                "name" => $buyer->firstName,
                "surname" => $buyer->lastName,
                "email" => $buyer->email,
                "document" => $buyer->document,
                "documentType" => $buyer->typeDocument,
                "mobile" => $buyer->phone
            ],
            'payment' => [
                'reference' => $reference,
                'description' => 'Prueba de pago referencia: ' .$reference,
                'amount' => [
                    'currency' => env('P2P_CURRENCY'),
                    'total' => $data->price,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => env('P2P_RETURNURL') . 'response?reference=' . $reference,
            'ipAddress' => $_SERVER['REMOTE_ADDR'],
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $this->placetopay->request($request);
        return $response;
    }

    public function getStatus($reference){
        $this->conexionToPay();
        $response = $this->placetopay->query($reference);
        
        if ($response->isSuccessful()) {
            if ($response->status()->isApproved()) {
                return 'PAYED';
            }else{
                return 'REJECTED';
            }
        } else {
            print_r($response->status()->message() . "\n");
        }
    }

}
