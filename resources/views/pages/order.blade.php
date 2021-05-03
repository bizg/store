@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Tu compra</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $data->name }}</h6>
                            <small class="text-muted">{{ $data->description }}</small>
                        </div>
                        <span class="text-muted">${{ $data->price }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>${{ $data->price }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Información de compra</h4>
                <form class="needs-validation" action="{{ URL::to('/order/create') }}" method="POST">
					@csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre(s) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="Escribe aqui tu(s) nombre(s)" onblur="onCheckfield('firstName')" required>
                            <div class="invalid-feedback">
                                Valide el campo de nombre(s) es requerido.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Apellido(s) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Escribe aqui tu(s) apellido(s)" onblur="onCheckfield('lastName')" required>
                            <div class="invalid-feedback">
                                Valide el campo de apellido(s) es requerido.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="typeDocument" class="form-label">Tipo de documento <span class="text-danger">*</span></label>
							<select name="typeDocument" id="typeDocument" class="form-control" onblur="onCheckfield('typeDocument')" required>
								<option value="">- Seleccion un tipo de documento -</option>
								<option value="CC">Cedula de ciudadania</option>
								<option value="CE">Cedula de extranjeria</option>
							</select>

                            <div class="invalid-feedback">
                                Valide el campo de tipo de documento es requerido.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="document" class="form-label">Documento <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="document" name="document"
                                placeholder="Escribe aqui tu(s) apellido(s)" onblur="onCheckfield('document')" required>
                            <div class="invalid-feedback">
                                Valide el campo de documento es requerido.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">Correo electronico <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com"
                                onblur="onCheckfield('email')" required>
                            <div class="invalid-feedback">
                                Valide el campo de correo electronico es requerido.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Celular <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Escribe aqui tu celular" onblur="onCheckfield('phone')" required>
                            <div class="invalid-feedback">
                                Valide el campo de celular es requerido.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Colombia, Antioquia, Envigado, Carrera 10" onblur="onCheckfield('address')"
                                required>
                            <div class="invalid-feedback">
                                Valide el campo de dirección es requerido.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address" required>
                        <label class="form-check-label" for="same-address">Acepto terminos y condiciones</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="save-info" required>
                        <label class="form-check-label" for="save-info">Acepto politica de tratamiento de datos</label>
                    </div>

                    <hr class="my-4">

					<input type="hidden" name="id" id="id" value="{{ $data->id }}">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar con el pago</button>
                </form>
            </div>
        </div>
    </div>
@endsection
