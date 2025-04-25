@extends('profile.layout')
@section('profile.main')
    <!-- Personal Information -->
    <div class="mb-4">
        <h5 class="mb-4">Личные данные</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Имя</label>
                <input type="text" class="form-control" value="{{$user->name}}">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" value="{{$user->lastname}}">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">О себе</label>
                <textarea class="form-control"
                          rows="4">{{$bio ?? 'Расскажите о себе...'}}</textarea>
            </div>
        </div>
    </div>

    <!-- Contact info -->
    <div class="mb-4">
        <h5 class="mb-4">Контактная информация</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Номер телефона</label>
                <div class="row">
                    <div class="col-2 pe-0" style="width: 14%">
                        <select class="form-select w-auto">
                            <option selected>+7</option>
                            <option>+123</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="tel" class="form-control" id="ec-mobile-number"
                               aria-describedby="emailHelp" placeholder="+79998887766"
                               value="{{$phone}}"/>
                    </div>
                    <div class="col-sm-3">
                        <input type="button" class="form-control btn btn-success"
                               id="ec-mobile-number" aria-describedby="emailHelp"
                               value="Сохранить"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Telegram</label>
                <input type="text" class="form-control" value="Alex">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Telegram</label>
                <input type="text" class="form-control" value="Alex">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label">Telegram</label>
                <input type="text" class="form-control" value="Alex">
            </div>
        </div>
        {{--    TODO: кнопка "добавить мессенджер" с выбором--}}
    </div>

@endsection
