<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Главная</a></li>

    <li><a href="{{ route('doctors.appointments.list', ['id' => auth()->user()->id]) }}" class="nav-link px-2 text-white">Мои приемы</a></li>

    <li><a href="{{ route('doctors.patients.list', ['id' => auth()->user()->id]) }}" class="nav-link px-2 text-white">Мои пациенты</a></li>

    <li><a href="{{ route('doctors.services.list', ['id' => auth()->user()->id]) }}" class="nav-link px-2 text-white">Мои цены</a></li>

    <li><a href="{{ route('doctors.list') }}" class="nav-link px-2 text-white">Коллеги</a></li>

    <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">О нас</a></li>
</ul>
