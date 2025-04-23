@extends('layout')
@section('title')
    Цены и услуги
@endsection
@section('main')
    <div class="container mt-3">
        <h3 class="h3">Перечень услуг</h3>
        <div class="row mb-3">
            <div class="col-md-8 themed-grid-col text-bg-secondary text-center">Название</div>
            <div class="col-md-4 themed-grid-col text-bg-secondary text-center">Цена</div>
            @if(isset($services))
                @foreach(@$services as $service)
                    <div class="col-md-8 themed-grid-col text-bg-secondary text-center">{{$service->name}}</div>
                    <div class="col-md-4 themed-grid-col text-bg-secondary text-center">{{$service->price}}</div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
