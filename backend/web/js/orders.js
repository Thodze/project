/**
 * Action CURD Employees
 */
$(function () {
    /**
     * Add Datepicker
     */
    $('#date_of_birth').datepicker({
        dateForm: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    /**
     * Create employee
     */
    $('#create').click(function () {
        $('#employeeModal').html('Create Employee');
        $('#employee #save').click(function () {
            let name = $('#employee #name').val();
            let gender = $('#employee #gender').val();
            let date_of_birth = $('#employee #date_of_birth').val();
            let address = $('#employee #address').val();
            let phone = $('#employee #phone').val();
            let mail = $('#employee #mail').val();
            let id_department = $('#employee #id_department').val();
            // let _csrf = $('#category #_csrf').val();
            if (name) {
                $.ajax({
                    url: '/employees/create',
                    type: 'POST',
                    data: {
                        'name': name,
                        'gender': gender,
                        'date_of_birth': date_of_birth,
                        'address': address,
                        'phone': phone,
                        'mail': mail,
                        'id_department': id_department,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        let id = response['json']['id'];
                        $('.employees').append('<tr class="employee-' + id + '">' +
                            '<th scope="row">' + id + '</th>' +
                            '<td class="employeeName-' + id + '">' + name + '</td>' +
                            '<td class="employeeGender-' + id + '">' + gender + '</td>' +
                            '<td class="employeeDateOfBirth-' + id + '">' + date_of_birth + '</td>' +
                            '<td class="employeeAddress-' + id + '">' + address + '</td>' +
                            '<td class="employeePhone-' + id + '">' + phone + '</td>' +
                            '<td class="employeeMail-' + id + '">' + mail + '</td>' +
                            '<td class="employeeIdDepartment-' + id + '">' + id_department + '</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target="#employee" id="' + id + '">Edit</button>' +
                            '<button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#deleteEmployee" id="' + id + '">Delete</button>' +
                            '</td>' +
                            '</tr>');
                        $('#employee #name').val(null);
                        $('#employee #gender').val(null);
                        $('#employee #date_of_birth').val(null);
                        $('#employee #address').val(null);
                        $('#employee #phone').val(null);
                        $('#employee #mail').val(null);
                        $('#employee #id_department').val(null);
                        $('#employee').modal('hide');
                        name = "";
                        id_edit = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
    });

    $('.btnEdit').click(function () {
        let id_edit = $(this).attr('id');
        let name = $('.employeeName-' + id_edit).text();
        let gender = $('.employeeGender-' + id_edit).text();
        let date_of_birth = $('.employeeDateOfBirth-' + id_edit).text();
        let address = $('.employeeAddress-' + id_edit).text();
        let phone = $('.employeePhone-' + id_edit).text();
        let mail = $('.employeeMail-' + id_edit).text();
        let id_department = $('.employeeIdDepartment-' + id_edit).text();
        $('#employeeModal').html('Edit Employee');
        $('#employee #name').val(name);
        $('#employee #gender').val(gender);
        $('#employee #date_of_birth').val(date_of_birth);
        $('#employee #address').val(address);
        $('#employee #phone').val(phone);
        $('#employee #mail').val(mail);
        $('#employee #id_department').val(id_department);
        $('#employee #save').click(function () {
            name = $('#employee #name').val();
            gender = $('#employee #gender').val();
            date_of_birth = $('#employee #date_of_birth').val();
            address = $('#employee #address').val();
            phone = $('#employee #phone').val();
            mail = $('#employee #mail').val();
            id_department = $('#employee #id_department').val();
            if (name && id_edit) {
                // let _csrf = $('#employee #_csrf').val();
                $.ajax({
                    url: '/employees/update/' + id_edit,
                    type: 'POST',
                    data: {
                        'name': name,
                        'gender': gender,
                        'date_of_birth': date_of_birth,
                        'address': address,
                        'phone': phone,
                        'mail': mail,
                        'id_department': id_department,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        $('.employeeName-' + id_edit).html(name);
                        $('#employee #name').val(null);
                        $('#employee').modal('hide');
                        id_edit = "";
                        name = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
    });

    /**
     * Delete employee by id
     */
    $('.btnDelete').click(function () {
        let id_delete = $(this).attr('id');
        console.log(id_delete);
        $('#deleteEmployee #save').click(function () {
            if (id_delete) {
                $.ajax({
                    url: '/categories/delete/' + id_delete,
                    type: 'POST',
                    data: {
                        'id': id_delete
                    },
                    success: function (response) {
                        console.log(response);
                        $('#deleteEmployee').modal('hide');
                        $('.employee-' + id_delete).remove();
                        id_delete = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
        $('#deleteEmployee #close').click(function () {
            id_delete = "";
        });
    });

    /**
     * Reset value input
     */
    $('#employee #close').click(function () {
        $('#employee #name').val(null);
    });
});