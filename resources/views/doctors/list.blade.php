@extends('layout')
@section('title')
    Специалисты
@endsection
@section('main')
    <div class="container mt-3">
        <h3 class="h3">Врачи</h3>
        <div class="row mb-3">
            <div class="col-md-8 themed-grid-col text-bg-secondary text-center">ФИО</div>
            <div class="col-md-4 themed-grid-col text-bg-secondary text-center">Описание</div>
            @if(isset($doctors))
                @foreach($doctors as $doctor)
                    <div class="col-md-8 themed-grid-col text-bg-light text-center">{{$doctor->fio}}</div>
                    <div class="col-md-4 themed-grid-col text-bg-light text-center">{{$doctor->dob}}</div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
