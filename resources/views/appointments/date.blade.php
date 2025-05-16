@extends('layout')
@section('title')
    Запись на прием
@endsection
@section('main')
    <div class="container">
        <div class="my-5">
            <h2 class="fw-bold mb-0 fs-2">Запись на прием</h2>
            <form class="mt-3 row" method="post" action="{{ route('appointments.create') }}">
                <div class="col">
                    <div class="d-flex mb-2">
                        <label class="me-2 p-2 pe-0" for="service">Услуга:</label>
                        <select class="form-control form-select w-50">
                            <option selected disabled>Выберите услугу...</option>
                            @foreach($services as $service)
                                <option>{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex mb-2">
                        <label class="me-2 p-2 pe-0" for="service">Специалист:</label>
                        <select class="form-control form-select w-50">
                            <option selected disabled>Выберите специалиста...</option>
                            @foreach($services as $service)
                                @foreach($service->doctors as $doctor)
                                    <option>{{ $doctor->fio }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-sm btn-success">
                </div>
                <div class="col">
                    <h4>Выберите дату</h4>
                </div>
            </form>
        </div>
    </div>
@endsection
