@extends('appointments.layout')
@section('step')
    <form class="mt-3 w-50 form-control" method="post" action="{{ route('appointments.create', ['step' => 'service']) }}">
        @csrf
        <h3 class="mb-4">Выберите услугу</h3>

        <div class="d-flex flex-column align-items-end">
            <button class="btn-secondary">Раскрыть</button>
            <div class="list-group list-group-checkable d-grid gap-2 border-0 w-100">
                <input type="radio" class="btn-check" name="psychiatry" id="type1" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type1">Психология</label>

                <input type="radio" class="btn-check" name="psychology" id="type2" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type2">Психиатрия</label>

                <input type="radio" class="btn-check" name="test" id="type3" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type3">Disabled</label>

                <input type="radio" class="btn-check" name="testtest" id="type4" autocomplete="off">
                <label class="btn btn-light border border-2 border-secondary-subtle" for="type4">Radio</label>
            </div>

            <input type="submit" class="btn btn-success mt-2 w-25" value="Продолжить">
        </div>
    </form>
@endsection
