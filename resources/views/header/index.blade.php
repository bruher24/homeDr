<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="#" alt="LOGO">
            </a>
            @switch(auth()->user()->roles->first()->name)
                @case('doctor')
                    @include('header.doctorNav')
                    @break
                @case('patient')
                    @include('header.patientNav')
                    @break
                @case('admin')
                    @include('header.adminNav')
                    @break
                @default
                    @include('header.guestNav')
            @endswitch
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Поиск..."
                       aria-label="Search">
            </form>
            @guest
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal"
                            data-bs-target="#modalLogin">Войти
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSignin">
                        Регистрация
                    </button>
                </div>
            @endguest
            @auth
                <div class="dropdown text-end">
                    <a class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1"
                       data-bs-toggle="dropdown" aria-expanded="false"
                       style="cursor: pointer">
                        <img src="{{ auth()->user()->photo->src ?? 'storage/avatar.png'}}" alt="Avatar" width="40" height="40"
                             class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{ route('users.profile', ['section' => 'personal']) }}">Личный
                                кабинет</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.profile', ['section' => 'settings']) }}">Настройки</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('users.logout') }}">Выйти</a></li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
