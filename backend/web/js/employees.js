/**
 * Action CURD Employees
 */
$(function () {
    /**
     * Add Datepicker
     */
    $('#date_of_birth').datepicker({
        dateFormat: 'yy-mm-dd',
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

    $('.btnEditEmp').click(function () {
        let id_edit_emp = $(this).attr('id');
        let name_emp = $('.employeeName-' + id_edit_emp).text();
        let gender_emp = $('.employeeGender-' + id_edit_emp).text();
        gender_emp = gender_emp == "Male" ? 1 : 0;
        let date_of_birth_emp = $('.employeeDateOfBirth-' + id_edit_emp).text();
        let address_emp = $('.employeeAddress-' + id_edit_emp).text();
        let phone_emp = $('.employeePhone-' + id_edit_emp).text();
        let mail_emp = $('.employeeMail-' + id_edit_emp).text();
        let id_department = $('.employeeIdDepartment-' + id_edit_emp).find('span').attr('id');
        console.log(id_department);
        $('#employeeModal').html('Edit Employee');
        $('#employee #name').val(name_emp);
        $('#employee #gender').val(gender_emp);
        $('#employee #date_of_birth').val(date_of_birth_emp);
        $('#employee #address').val(address_emp);
        $('#employee #phone').val(phone_emp);
        $('#employee #mail').val(mail_emp);
        $('#employee #id_department').val(id_department);
        $('#employee #save').click(function () {
            name_emp = $('#employee #name').val();
            gender_emp = $('#employee #gender').val();
            date_of_birth_emp = $('#employee #date_of_birth').val();
            address_emp = $('#employee #address').val();
            phone_emp = $('#employee #phone').val();
            mail_emp = $('#employee #mail').val();
            id_department = $('#employee #id_department').val();
            if (name_emp && id_edit_emp) {
                // let _csrf = $('#employee #_csrf').val();
                $.ajax({
                    url: '/employees/update/' + id_edit_emp,
                    type: 'POST',
                    data: {
                        'name': name_emp,
                        'gender': gender_emp,
                        'date_of_birth': date_of_birth_emp,
                        'address': address_emp,
                        'phone': phone_emp,
                        'mail': mail_emp,
                        'id_department': id_department,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        gender_emp = gender_emp == 1 ? "Male" : "Female";
                        $('.employeeName-' + id_edit_emp).html(name_emp);
                        $('.employeeGender-' + id_edit_emp).html(gender_emp);
                        $('.employeeDateOfBirth-' + id_edit_emp).html(date_of_birth_emp);
                        $('.employeeAddress-' + id_edit_emp).html(address_emp);
                        $('.employeePhone-' + id_edit_emp).html(phone_emp);
                        $('.employeeMail-' + id_edit_emp).html(mail_emp);
                        $('.employeeIdDepartment-' + id_edit_emp).html(id_department);
                        $('#employee').modal('hide');
                        id_edit_emp = "";
                        name_emp = "";
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
    $('.btnDeleteEmp').click(function () {
        let id_delete_emp = $(this).attr('id');
        console.log(id_delete_emp);
        $('#deleteEmployee #save').click(function () {
            if (id_delete_emp) {
                $.ajax({
                    url: '/employees/delete/' + id_delete_emp,
                    type: 'POST',
                    data: {
                        'id': id_delete_emp
                    },
                    success: function (response) {
                        console.log(response);
                        $('#deleteEmployee').modal('hide');
                        $('.employee-' + id_delete_emp).remove();
                        id_delete_emp = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
        $('#deleteEmployee #close').click(function () {
            id_delete_emp = "";
        });
    });

    /**
     * Reset value input
     */
    $('#employee #close').click(function () {
        $('#employee #name').val(null);
        $('#employee #gender').val(null);
        $('#employee #date_of_birth').val(null);
        $('#employee #address').val(null);
        $('#employee #phone').val(null);
        $('#employee #mail').val(null);
        $('#employee #id_department').val(null);
    });
});