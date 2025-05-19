import $ from 'jquery';

$(document).ready(function () {
    $('#submitDoc').on('click', function (e) {
        e.preventDefault();

        const doctorId = $('input[name="doctor"]:checked').val();
        if (doctorId) {
            $('<input>', {
                type: 'hidden',
                id: 'docId',
                name: 'doctor_id',
                value: doctorId
            }).appendTo('#docForm');

            $('#docForm').submit();
        } else {
            alert("Вы не выбрали специалиста!");
        }

        const serviceId = $('input[name="service"]:checked').val();
        if (serviceId) {
            $('<input>', {
                type: 'hidden',
                id: 'serviceId',
                name: 'service_id',
                value: serviceId
            }).appendTo('#docForm');

            $('#docForm').submit();
        } else {
            alert("Вы не выбрали услугу!");
        }

    });
});
