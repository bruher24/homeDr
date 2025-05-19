@extends('appointments.layout')
@section('step')
    <form class="mt-3 w-50 " id="docForm" method="post"
          action="{{ route('appointments.create') }}">
        @csrf

        @can('is-admin')
            <!--ПАЦИЕНТ (ДЛЯ АДМИНА)-->
            <div class="mt-3 form-control">
                <h3 class="mb-4">Выберите пациента</h3>
                <select class="form-select select">
                    <option disabled selected>Выберите пациента...</option>
                    @foreach($patients as $patient)
                        <option>{{ $patient->fio }}</option>
                    @endforeach
                </select>
            </div>
        @endcan
        <!--ВРАЧИ-->
        <div class="mt-3 form-control">
            <h3 class="mb-4">Выберите специалиста</h3>

            <div class="list-group list-group-checkable d-grid gap-2 border-0 w-100">
                @foreach($doctors as $doctor)
                    <input type="radio" class="btn-check doctor-radio" autocomplete="off"
                           name="doctor" id="doc{{ $doctor->id }}" value="{{ $doctor->id }}">
                    <label class="btn btn-light border border-2 border-secondary-subtle text-start"
                           for="doc{{ $doctor->id }}">
                        <span class="text-dark">{{ $doctor->fio }}</span>
                        <br>
                        <span class="text-secondary">{{ $doctor->speciality->first()->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <!--УСЛУГИ-->
        <div class="mt-3 form-control" id="services-container" style="display: none;">
            <h3 class="mb-4">Выберите услугу</h3>
            <div class="list-group list-group-checkable d-grid gap-2 border-0 w-100" id="services-list"></div>
        </div>
        <!--КАЛЕНДАРЬ-->

        <div class="mt-3 form-control" id="date-container" style="display: none;">
            <h3 class="mb-4">Выберите дату приема</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="appointmentDate" class="form-label">Дата приема</label>
                    <input type="text" class="form-control" id="appointmentDate" name="date" readonly>
                </div>
                <div class="col-md-6" id="time-slots-container" style="display: none;">
                    <label for="appointmentTime" class="form-label">Время приема</label>
                    <select class="form-select" id="appointmentTime" name="time"></select>
                </div>
            </div>
        </div>


        <input type="button" class="btn btn-success mt-2 w-25" id="submitDoc" value="Продолжить">
    </form>
@endsection
