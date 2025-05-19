import $ from 'jquery';

$(document).ready(function () {
    $('.doctor-radio').change(function () {
        if ($(this).is(':checked')) {
            const doctorId = $(this).val();

            // Показываем контейнер с услугами
            $('#services-container').show();

            // Загружаем услуги через AJAX
            $.ajax({
                url: '/doctors/' + doctorId + '/services/list', // URL для получения услуг
                method: 'GET',
                data: {id: doctorId},
                success: function (response) {
                    // Очищаем список услуг
                    $('#services-list').empty();
                    // Добавляем каждую услугу в список
                    response.services.forEach(function (service) {
                        $('#services-list').append(`
                            <input type="radio" class="btn-check service-radio"
                                   name="service" id="service${service.id}"
                                   value="${service.id}" autocomplete="off">
                            <label class="btn btn-light border border-2 border-secondary-subtle text-start"
                                   for="service${service.id}">
                                <span class="text-dark">${service.name}</span>
                                <br>
                                <span class="text-secondary">${service.pivot.price} руб.</span>
                            </label>
                        `);
                    });
                },
                error: function (xhr) {
                    console.error('Ошибка при загрузке услуг');
                }
            });
        }
    });

});
