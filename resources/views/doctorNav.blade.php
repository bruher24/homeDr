<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">Главная</a></li>

    <li><a href="{{url('doctor//appointments')}}" class="nav-link px-2 text-white">Мои приемы</a></li>

    <li><a href="{{ url('doctors/12345/patients') }}" class="nav-link px-2 text-white">Мои пациенты</a></li>

    <li><a href="{{url('doctor/123/services')}}" class="nav-link px-2 text-white">Мои цены</a></li>

    <li><a href="{{ url('doctors/list') }}" class="nav-link px-2 text-white">Коллеги</a></li>

    <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
</ul>
{{--TODO: поменять все url на route--}}
