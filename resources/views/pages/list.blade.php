@extends('layouts.master')
@section('content')
	@if (count($data) > 0)
		<b>NOTA:</b> Recuerda que todos los pagos que estan creados<b>(CREATED)</b> pueden ser terminando dando click en el
		enlace del registro.
	@endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Estado</th>
                <th>Producto</th>
                <th>Valor</th>
                <th>Fecha</th>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($data); $i++)
                    <tr>
                        <td>{{ $data[$i]['id'] }}</td>
                        <td>{{ $data[$i]['customer_name'] }}</td>
                        <td>{{ $data[$i]['customer_email'] }}</td>
                        <td>{{ $data[$i]['customer_mobile'] }}</td>
                        <td>
                            @if ($data[$i]['status'] == 'CREATED' && date('Y-m-d H:i:s') < $data[$i]['expired_date'])
                                <a
                                    href="{{ $data[$i]['url'] }}">{{ $data[$i]['status'] }}</a>
                            @else
                                {{ $data[$i]['status'] }}
                            @endif
                        </td>
                        <td>{{ $data[$i]['product'] }}</td>
                        <td>${{ $data[$i]['price'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($data[$i]['created_at'])->format('Y:m:d H:i:s') }}</td>
                    </tr>
                @endfor
                @if (count($data) == 0)
                    <tr>
                        <td colspan="8" class="text-center">No hay transacciones en este momento</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
