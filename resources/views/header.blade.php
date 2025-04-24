<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">Главная</a></li>
                <li>
                    <div class="dropdown">
                        <a class="nav-link px-2 text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Категории
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Запись на прием</a></li>
                            <li><a class="dropdown-item" href="#">Вопросы</a></li>
                            <li><a class="dropdown-item" href="#">Отзывы</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{url('services')}}" class="nav-link px-2 text-white">Цены и услуги</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Контакты</a></li>
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
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="40" height="40" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="#">Мои пациенты (?)</a></li>
                        <li><a class="dropdown-item" href="{{url('profile')}}">Личный кабинет</a></li>
                        <li><a class="dropdown-item" href="#">Настройки</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url('logout')}}">Выйти</a></li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
