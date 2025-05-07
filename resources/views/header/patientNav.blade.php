<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Главная</a></li>

    <li><a href="{{ route('patients.appointments.create', ['id' => $user->id]) }}" class="nav-link px-2 text-white">Запись на прием</a></li>

    <li><a href="{{ route('services.list') }}" class="nav-link px-2 text-white">Цены и услуги</a></li>

    <li><a href="{{ route('doctors.list') }}" class="nav-link px-2 text-white">Специалисты</a></li>

    <li><a href="{{ route('patients.appointments.list', ['id' => $user->id]) }}" class="nav-link px-2 text-white">Мои приемы</a></li>

    <li><a href="{{ route('patients.doctors.list', ['id' => $user->id]) }}" class="nav-link px-2 text-white">Мои врачи</a></li>

    <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">О нас</a></li>
</ul>
