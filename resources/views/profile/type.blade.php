@extends('profile.layout')
@section('profile.main')
    <!-- Settings Cards -->
    <div class="mb-4">
        <h5 class="mb-4">Тип аккаунта</h5>
        <form method="post" action="{{url("user/switch_type")}}">
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="settings-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Аккаунт врача</h6>
                                    <p class="text-muted mb-0 small">Аккаунт, который используется сотрудником</p>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="doctor_check" name="doctor_check">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            --}}
            @if($role === 'doctor' || $role === 'admin')
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="specialty" class="form-label">Специальность</label>
                            <!--                    <input type="text" class="form-control" id="specialty" name="specialty" placeholder="Введите вашу специальность">-->
                            <select type="text" class="form-control" id="specialty" name="specialty">
                                <option selected>
                                    Выберите вашу специальность...
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 ">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="experience" class="form-label">Стаж (лет)</label>
                            <input type="number" class="form-control" id="experience" name="experience" placeholder="Укажите ваш стаж" min="0">
                        </div>
                    </div>
                </div>
            @endif
{{--            --}}
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="settings-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Email Notifications</h6>
                                    <p class="text-muted mb-0 small">Receive activity updates
                                    </p>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-1">
                    <input type="button" class="form-control btn btn-success"
                           id="save_type_btn"
                           value="Сохранить"/>
                </div>
            </div>
        </form>
    </div>
@endsection
