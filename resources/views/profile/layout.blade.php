@extends('layout')
@section('title')
    Личный кабинет
@endsection
@section('main')
    <!-- Main Content -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="row g-0">
                    <!-- Sidebar -->
                    <div class="col-lg-3 border-end">
                        <div class="p-4">
                            <div class="nav flex-column nav-pills">
                                <a class="nav-link text-light text-bg-dark" href="#"><i class="fas fa-user me-2"></i>Personal Info</a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-lock me-2"></i>Security</a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-bell me-2"></i>Notifications</a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-credit-card me-2"></i>Billing</a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-chart-line me-2"></i>Activity</a>
                            </div>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="col-lg-9">
                        <div class="p-4">
                            <!-- Personal Information -->
                            <div class="mb-4">
                                <h5 class="mb-4">Личные данные</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Имя</label>
                                        <input type="text" class="form-control" value="Alex">
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="form-label">Last Name</label>--}}
{{--                                        <input type="text" class="form-control" value="Johnson">--}}
{{--                                    </div>--}}
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="alex.johnson@example.com">
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="form-label">Phone</label>--}}
{{--                                        <input type="tel" class="form-control" value="+1 (555) 123-4567">--}}
{{--                                    </div>--}}
                                    <div class="col-md-6">
                                        <label class="form-label">О себе</label>
                                        <textarea class="form-control" rows="4">Product designer with 5+ years of experience in creating user-centered digital solutions. Passionate about solving complex problems through simple and elegant designs.</textarea>
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
                                            <div class="col-4 pe-1 ps-0">
                                                <input type="text" class="form-control" id="ec-mobile-number" aria-describedby="emailHelp" placeholder="91257888" />
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="button" class="form-control btn btn-success" id="ec-mobile-number" aria-describedby="emailHelp" value="Сохранить" />
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
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="alex.johnson@example.com">
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label">О себе</label>
                                        <textarea class="form-control" rows="4">Product designer with 5+ years of experience in creating user-centered digital solutions. Passionate about solving complex problems through simple and elegant designs.</textarea>
                                    </div>
                                </div>
                            </div>




                            <!-- Recent Activity -->
                            <div>
                                <h5 class="mb-4">Recent Activity</h5>
                                <div class="activity-item mb-3">
                                    <h6 class="mb-1">Updated profile picture</h6>
                                    <p class="text-muted small mb-0">2 hours ago</p>
                                </div>
                                <div class="activity-item mb-3">
                                    <h6 class="mb-1">Changed password</h6>
                                    <p class="text-muted small mb-0">Yesterday</p>
                                </div>
                                <div class="activity-item">
                                    <h6 class="mb-1">Updated billing information</h6>
                                    <p class="text-muted small mb-0">3 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
