@extends('appointments.layout')
@section('step')
    <form class="mt-3 w-50 " id="docForm" method="post"
          action="{{ route('appointments.create', ['step' => 'doctor']) }}">
        @csrf
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

                <input type="radio" class="btn-check" name="psychology" id="type2" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type2">
                    Психиатрия
                </label>

                <input type="radio" class="btn-check" name="test" id="type3" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type3">
                    Disabled
                </label>

                <input type="radio" class="btn-check" name="testtest" id="type4" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type4">
                    Radio
                </label>
            </div>
        </div>
{{--        TODO: решить проблему отображения услуг только выбранного доктора--}}
        <!--УСЛУГИ-->
        <div class="mt-3 form-control" id="service-container" style="display: none;">
            <h3 class="mb-4">Выберите услугу</h3>

            <div class="list-group list-group-checkable d-grid gap-2 border-0 w-100">
                @foreach($doctors as $doctor)
                    <input type="radio" class="btn-check" autocomplete="off"
                           name="doctor" id="doc{{ $doctor->id }}" value="{{ $doctor->id }}">
                    <label class="btn btn-light border border-2 border-secondary-subtle text-start"
                           for="doc{{ $doctor->id }}">
                        <span class="text-dark">{{ $doctor->fio }}</span>
                        <br>
                        <span class="text-secondary">{{ $doctor->speciality->first()->name }}</span>
                    </label>
                @endforeach

                <input type="radio" class="btn-check" name="psychology" id="type2" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type2">
                    Психиатрия
                </label>

                <input type="radio" class="btn-check" name="test" id="type3" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type3">
                    Disabled
                </label>

                <input type="radio" class="btn-check" name="testtest" id="type4" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type4">
                    Radio
                </label>
            </div>
        </div>
        <!--КАЛЕНДАРЬ-->
        <input type="submit" class="btn btn-success mt-2 w-25" id="submitDoc" value="Продолжить">
    </form>
@endsection
