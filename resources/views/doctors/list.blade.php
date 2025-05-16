@extends('layout')
@section('title')
    Специалисты
@endsection
@section('main')
    <div class="container mt-3">
        <h3 class="h3">Врачи</h3>

        <div class="row my-4">
            <div class="col-sm-2">
                <form class="form d-flex" method="get" action="{{ route('doctors.list') }}">
                    <label class="me-1" for="sort">Сортировка: </label>
                    <select class="form-select form-select-sm" id="sort">
                        <option value="rating" selected>Рейтинг</option>
                        <option value="fio">ФИО</option>
                        <option value="stage">Стаж</option>
                        <option value="speciality">Специальность</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-sm-3 themed-grid-col text-bg-secondary text-center">ФИО</div>
            <div class="col-sm-3 themed-grid-col text-bg-secondary text-center">Специальность</div>
            <div class="col-sm-3 themed-grid-col text-bg-secondary text-center">Стаж работы</div>
            <div class="col-sm-3 themed-grid-col text-bg-secondary text-center">Рейтинг</div>
        </div>
            @if(isset($doctors))
                @foreach($doctors as $doctor)
                    <div class="row mb-1">
                        <div class="col-sm-3 themed-grid-col text-bg-light text-center">
                            <a class="link-dark link-underline link-underline-opacity-0"
                               href="{{ route('doctors.details', ['id' => $doctor->user->id]) }}">
                                {{$doctor->fio}}
                            </a>
                        </div>
                        <div class="col-sm-3 themed-grid-col text-bg-light text-center">{{$doctor->speciality}}</div>
                        <div class="col-sm-3 themed-grid-col text-bg-light text-center">{{$doctor->user->stage}}</div>
                        <div class="col-sm-3 themed-grid-col text-bg-light text-center">{{$doctor->rating}}</div>
                    </div>
                @endforeach
            @endif
    </div>
@endsection
