<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index($id)
    {
        $data = Product::find($id);
        return view('pages.order', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $dataProduct = Product::find($request->id);
        $reference = $this->generateIdPayment();
        $p2p = new P2pController();
        $p2p->conexionToPay();
        $response = $p2p->generatePayment($dataProduct, $reference, $request);

        if ($response->isSuccessful()) {
            // ddd($response);
            $this->save($request, $reference, 'CREATED', $response);
            header('Location: ' . $response->processUrl());
            exit;
        } else {
            $response->status()->message();
        }
    }

    public function save($request, $reference, $status, $response)
    {
        $order = new Orders();
        $order->customer_name = $request->firstName . ' ' . $request->lastName;
        $order->customer_email = $request->email;
        $order->customer_mobile = $request->phone;
        $order->customer_address = $request->address;
        $order->customer_document = $request->document;
        $order->customer_type_document = $request->typeDocument;
        $order->status = $status;
        $order->reference = $reference;
        $order->product_id = $request->id;
        $order->session = $response->requestId();
        $order->url = $response->processUrl();
        $order->expired_date = date('Y-m-d H:i:s', strtotime('+2 days'));
        $order->save();
    }

    public function generateIdPayment()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $strlength = 16;
        $lenght = strlen($characters);
        $string = '';
        for ($i = 0; $i < $strlength; $i++) {
            $character = $characters[mt_rand(0, $lenght - 1)];
            $string .= $character;
        }

        return $string;
    }

    public function response(Request $request)
    {
        $p2p = new P2pController();
        $data = Orders::join('products', 'products.id', 'orders.product_id')->where('reference', $request->reference)->first();
        $status = $p2p->getStatus($data->session);
        $this->update($data, $status);
        return view('pages.response', ['data' => $data, 'status' => ($status == 'PAYED') ? 'APROBADO' : 'RECHAZADO']);
    }

    public function update($data, $status)
    {
        Orders::where('session', $data->session)->update(['status' => $status]);
    }

    public function list()
    {
        $data = Orders::join('products', 'products.id', 'orders.product_id')->select(
                                'products.name as product',
                                'products.price',
                                'orders.id',
                                'customer_name',
                                'customer_email',
                                'customer_mobile',
                                'status',
                                'reference',
                                'url',
                                'expired_date',
                                'orders.created_at',
                            )
                            ->orderBy('created_at','desc')
                            ->get()
                            ->toArray();
        return view('pages.list', ['data' => $data]);
    }
}
