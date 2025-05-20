<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="#" alt="LOGO">
            </a>
            <!--NAVBAR-->
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a class="nav-link px-2 text-secondary"
                       href="{{ route('home') }}">
                        Главная
                    </a>
                </li>

                @cannot('is-doctor')
                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('services.list') }}">
                            Цены и услуги
                        </a>
                    </li>

                    <li><a class="nav-link px-2 text-white"
                           href="{{ route('doctor.list') }}">
                            Специалисты
                        </a>
                    </li>

                    <li>
                        <a class="nav-link px-2 text-white"
                            href="{{ route('appointments.createForm') }}">
                            Запись на прием
                        </a>
                    </li>
                @endcannot

                @can('is-admin')
                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('admin.index') }}">
                            Администрирование
                        </a>
                    </li>
                @endcan

                @can('is-doctor')
                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('doctor.appointments.list', ['id' => auth()->id()]) }}">
                            Мои приемы
                        </a>
                    </li>

                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('doctor.patients.list', ['id' => auth()->id()]) }}">
                            Мои пациенты
                        </a>
                    </li>

                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('doctor.services.list', ['id' => auth()->id()]) }}">
                            Мои цены
                        </a>
                    </li>

                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('doctor.list') }}">
                            Коллеги
                        </a>
                    </li>
                @endcan

                @can('is-patient')
                    <li>
                        <a class="nav-link px-2 text-white"
                           href="{{ route('patients.appointments.list', ['id' => $user->id]) }}">
                            Мои приемы
                        </a>
                    </li>

                    <li><a class="nav-link px-2 text-white"
                           href="{{ route('patients.doctors.list', ['id' => $user->id]) }}">
                            Мои врачи
                        </a>
                    </li>
                @endcan

                <li>
                    <a class="nav-link px-2 text-white"
                       href="{{ route('about') }}">
                        О нас
                    </a>
                </li>
            </ul>

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
                        <img src="{{ isset(auth()->user()->photo) ? auth()->user()->photo->src : '/storage/avatar.png'}}" alt="Avatar" width="40"
                             height="40"
                             class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('user.profile', ['section' => 'personal']) }}">
                                Личный кабинет
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('user.profile', ['section' => 'settings']) }}">
                                Настройки
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('user.logout') }}">
                                Выйти
                            </a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
