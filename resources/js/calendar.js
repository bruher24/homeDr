import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { Russian } from 'flatpickr/dist/l10n/ru.js';


document.addEventListener('DOMContentLoaded', function() {
    // Инициализация Flatpickr (нативный JavaScript)
    const datePicker = flatpickr("#appointmentDate", {
        locale: Russian,
        minDate: "today",
        maxDate: new Date().fp_incr(30), // 30 дней вперед
        disable: [], // Начнем с пустого массива
        onChange: function(selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                loadAvailableTimes(selectedDates[0]);
                document.getElementById("time-slots-container").style.display = 'block';
            }
        }
    });

    // Функция для загрузки недоступных дат
    function loadDisabledDates(doctorId) {
        fetch(`/api/schedule/${doctorId}/getDisabledDates`)
            .then(response => response.json())
            .then(data => {
                // Получаем даты с сервера
                const serverDisabledDates = data.dates || [];

                // Добавляем все выходные (субботы и воскресенья) в диапазоне календаря
                const weekendDates = getWeekendDates(
                    new Date(), // Начиная с сегодня
                    new Date().fp_incr(30) // 30 дней вперед
                );

                // Объединяем даты с сервера и выходные
                const allDisabledDates = [...new Set([...serverDisabledDates, ...weekendDates])];

                // Устанавливаем недоступные даты
                datePicker.set('disable', allDisabledDates);
                document.getElementById("date-container").style.display = 'block';
            })
            .catch(error => {
                console.error('Error loading disabled dates:', error);
            });
    }

// Вспомогательная функция для получения всех выходных в диапазоне
    function getWeekendDates(startDate, endDate) {
        const weekends = [];
        const currentDate = new Date(startDate);

        while (currentDate <= endDate) {
            // 0 - воскресенье, 6 - суббота
            if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
                weekends.push(currentDate.toISOString().split('T')[0]);
            }
            currentDate.setDate(currentDate.getDate() + 1);
        }

        return weekends;
    }

    // Функция для загрузки доступного времени
    function loadAvailableTimes(selectedDate) {
        const doctorId = document.querySelector("input[name='doctor']:checked").value;
        const dateStr = formatDate(selectedDate);

        fetch(`/api/schedule/${doctorId}/getTimes/${dateStr}`)
            .then(response => response.json())
            .then(data => {
                const timeSelect = document.getElementById("appointmentTime");
                timeSelect.innerHTML = '';

                if (data.times.length > 0) {
                    data.times.forEach(time => {
                        const option = document.createElement('option');
                        option.value = time;
                        option.textContent = time;
                        timeSelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.textContent = 'Нет доступного времени';
                    option.disabled = true;
                    timeSelect.appendChild(option);
                }
            });
    }

    // Вспомогательная функция для форматирования даты в YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Обработчик выбора врача
    document.querySelectorAll("input[name='doctor']").forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                loadDisabledDates(this.value);
            }
        });
    });
});
