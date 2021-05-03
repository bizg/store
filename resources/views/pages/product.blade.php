@extends('layouts.master')
@section('content')

    <div class="row row-cols-1 row-cols-md-4 g-4">
		@for ($i = 0; $i < count($data); $i++)
        <div class="col">
            <div class="card h-100">
                <img src="{{ URL::to('images/'.$data[$i]['image']) }}.png" class="card-img-top" alt="..." style="max-width: 250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $data[$i]['name'] }}</h5>
                    <p class="card-text">{{ $data[$i]['description'] }}</p>
                    <p class="card-text"><b>Precio</b>: ${{ $data[$i]['price'] }}</p>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="{{ url('order/'.$data[$i]['id']) }}" class="btn btn-outline-primary">Comprar</a>
                </div>
            </div>
        </div>
		@endfor
    </div>
@endsection
