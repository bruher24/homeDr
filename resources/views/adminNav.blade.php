<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="#" alt="LOGO">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">Главная</a></li>
{{--                <li>--}}
{{--                    <div class="dropdown">--}}
{{--                        <a class="nav-link px-2 text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink"--}}
{{--                           data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Действия--}}
{{--                        </a>--}}

{{--                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                            <li><a class="dropdown-item" href="#">Запись на прием</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Вопросы</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Отзывы</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
                @if($role == 'doctor')
                    <li><a href="{{url('doctor//appointments')}}" class="nav-link px-2 text-white">Мои приемы</a></li>
                @else
                    <li><a href="{{url('patient//appointment')}}" class="nav-link px-2 text-white">Запись на прием</a></li>
                @endif
                <li><a href="{{url('services')}}" class="nav-link px-2 text-white">Цены и услуги</a></li>
                <li><a href="{{ url('doctors/list') }}" class="nav-link px-2 text-white">Специалисты</a></li>
                    @switch($role)
                        @case('doctor')
                            <li><a href="{{ url('doctors/12345/patients') }}" class="nav-link px-2 text-white">Мои пациенты</a></li>
                            @break
                        @case('patient')
                            <li><a href="{{ url('doctors/list') }}" class="nav-link px-2 text-white">Мои врачи</a></li>
                            @break
                        @case('admin')
                            <li><a href="{{ url('admin') }}" class="nav-link px-2 text-white">Администрирование</a></li>
                            @break
                   @endswitch

                <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
            </ul>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Поиск..."
                       aria-label="Search">
            </form>
            @guest
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Войти</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSignin">Регистрация</button>
                </div>
            @endguest
            @auth
                <div class="dropdown text-end">
                    <a class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"
                    style="cursor: pointer">
                        <img src="{{ $user->photo->src ?? 'storage/avatar.png'}}" alt="Avatar" width="40" height="40" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{url('profile/personal')}}">Личный кабинет</a></li>
                        <li><a class="dropdown-item" href="{{ url('profile/settings') }}">Настройки</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url('logout')}}">Выйти</a></li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
