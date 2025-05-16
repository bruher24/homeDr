document.addEventListener('DOMContentLoaded', function() {
    const doctorCheckbox = document.getElementById('doctor_check');
    const doctorFieldsContainer = document.createElement('div');
    doctorFieldsContainer.id = 'doctor-fields-container';
    doctorFieldsContainer.className = 'mt-4';
    doctorFieldsContainer.innerHTML = `
        <div class="row g-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="specialty" class="form-label">Специальность</label>
<!--                    <input type="text" class="form-control" id="specialty" name="specialty" placeholder="Введите вашу специальность">-->
                    <select type="text" class="form-control" id="specialty" name="specialty">
                        <option selected>
                            Выберите вашу специальность...
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3 ">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="experience" class="form-label">Стаж (лет)</label>
                        <input type="number" class="form-control" id="experience" name="experience" placeholder="Укажите ваш стаж" min="0">
                    </div>
            </div>
        </div>
    `;

    // Вставляем контейнер с полями после блока с чекбоксом
    // doctorCheckbox.closest('.settings-card').parentElement.insertAdjacentElement('afterend', doctorFieldsContainer);

    // Инициализируем видимость полей в соответствии с состоянием чекбокса
    // toggleDoctorFields();

    // Обработчик изменения состояния чекбокса
    // doctorCheckbox.addEventListener('change', toggleDoctorFields);
    doctorCheckbox.addEventListener('change', (e)=>{
        e.preventDefault();
        window.location.reload();
    });

    function toggleDoctorFields() {
        if (doctorCheckbox.checked) {
            doctorFieldsContainer.style.display = 'block';
        } else {
            doctorFieldsContainer.style.display = 'none';
            // Очищаем поля при скрытии (опционально)
            document.getElementById('specialty').value = '';
            document.getElementById('experience').value = '';
        }
    }
});


document.getElementById('submitDoc').addEventListener('click', (e) => {
    e.preventDefault();
    let val = document.querySelector('input[name="doctor"]:checked').value;
    if (val != null){
        let exists = document.getElementById('hiddenDoc');
        if (exists) {
            exists.remove();
        }

        let field = document.createElement('input');
        field.type = 'hidden';
        field.value = val;
        field.id = "docId";

        let form = document.getElementById('docForm');
        form.appendChild(field);
        form.submit();
    }
});

$(document).ready(function() {
    $('.doctor-radio').change(function() {
        if ($(this).is(':checked')) {
            const doctorId = $(this).val();

            // Показываем контейнер с услугами
            $('#services-container').show();

            // Загружаем услуги через AJAX
            $.ajax({
                url: '/doctors/'+doctorId+'/services/list', // URL для получения услуг
                method: 'GET',
                data: { id: doctorId },
                success: function(response) {
                    // Очищаем список услуг
                    $('#services-list').empty();

                    // Добавляем каждую услугу в список
                    response.services.forEach(function(service) {
                        $('#services-list').append(`
                            <input type="radio" class="btn-check service-radio"
                                   name="service" id="service${service.id}"
                                   value="${service.id}" autocomplete="off">
                            <label class="btn btn-light border border-2 border-secondary-subtle text-start"
                                   for="service${service.id}">
                                <span class="text-dark">${service.name}</span>
                                <br>
                                <span class="text-secondary">${service.price} руб.</span>
                            </label>
                        `);
                    });
                },
                error: function(xhr) {
                    console.error('Ошибка при загрузке услуг');
                }
            });
        }
    });
});
