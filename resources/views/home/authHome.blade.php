@auth
    <div class="container mt-4">
        <h1 class="border-bottom pb-2">Актуальное</h1>
        <div class="row g-4 mb-4 mt-1">
            <h4>Ближайшие консультации</h4>
{{--            TODO: продумать--}}
            <!-- РАЗДЕЛ С КАРТОЧКАМИ ПРЕДСТОЯЩИХ КОНСУЛЬТАЦИЙ -->
            <div class="col-sm-4 mt-0">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <h5 class="mb-3"><a class="link link-underline link-underline-opacity-0" href="#">Вася
                                        Пупкин</a></h5>
                                <p class="mb-1">01.01.2025 в 16:00</p>
                                <a class="mb-0 link link-underline link-underline-opacity-0 link-primary" href="#">Телеграм</a>
                            </div>
                            @can('is-doctor')
                                <div class="col-sm-4">
                                    <button class="btn btn-sm btn-success rounded-1 mb-2 w-100">Начать</button>
                                    <button class="btn btn-sm btn-warning rounded-1 mb-2 w-100">Изменить</button>
                                    <button class="btn btn-sm btn-danger rounded-1 w-100">Отменить</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
