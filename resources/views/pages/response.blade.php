@extends('layouts.master')
@section('content')
    <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-5 col-lg-4 ">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Resumen de transacción</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Estado de la transacción</h6>
                    </div>
                    <span class="text-muted">{{ $status }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Referencia transacción</h6>
                    </div>
                    <span class="text-muted">{{ $data->reference }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Nombre</h6>
                    </div>
                    <span class="text-muted">{{ $data->customer_name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Telefono</h6>
                    </div>
                    <span class="text-muted">{{ $data->customer_mobile }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Email</h6>
                    </div>
                    <span class="text-muted">{{ $data->customer_email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Valor transacción</h6>
                    </div>
                    <span class="text-muted">${{ $data->price }}</span>
                </li>
            </ul>
           <a href="{{ URL::to('/') }}" class="btn btn-outline-success d-flex justify-content-center">Volver a los productos</a>
        </div>

    </div>
@endsection
