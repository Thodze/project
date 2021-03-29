/**
 * Action CURD Departments
 */
$(function () {
    /**
     * Create department
     */
    $('#createDep').click(function () {
        $('#departmentModal').html('Create Department');
        $('#department #save').click(function () {
            let nameDep = $('#department #name').val();
            // let _csrf = $('#category #_csrf').val();
            if (nameDep != null) {
                $.ajax({
                    url: '/departments/create',
                    type: 'POST',
                    data: {
                        'name': nameDep,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        let idDep = response['json']['id'];
                        if (idDep) {
                            $('.departments').append('<tr class="department-' + idDep + '">' +
                                '<th scope="row">' + idDep + '</th>' +
                                '<td class="departmentName-'+idDep+'">' + nameDep + '</td>' +
                                '<td>0</td>' +
                                '<td>' +
                                '<button type="button" class="btn btn-primary btn-sm btnEditDep" data-toggle="modal" data-target="#department" id="' + idDep + '">Edit</button>' +
                                '<button type="button" class="btn btn-danger btn-sm btnDeleteDep" data-toggle="modal" data-target="#deleteDepartment" id="' + idDep + '">Delete</button>' +
                                '</td>' +
                                '</tr>');
                        }
                        nameDep = "";
                        $('#department #name').val(null);
                        $('#department').modal('hide');
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
    });

    $('.btnEditDep').click(function () {
        let id_edit_dep = $(this).attr('id');
        let name_dep = $('.departmentName-' + id_edit_dep).text();
        $('#departmentModal').html('Edit Department');
        console.log(id_edit_dep);
        console.log(name_dep);
        $('#department #name').val(name_dep);
        $('#department #save').click(function () {
            name_dep = $('#department #name').val();
            if (name_dep && id_edit_dep) {
                // let _csrf = $('#category #_csrf').val();
                $.ajax({
                    url: '/departments/update/' + id_edit_dep,
                    type: 'POST',
                    data: {
                        'name': name_dep,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        $('.departmentName-' + id_edit_dep).html(name_dep);
                        $('#department #name').val(null);
                        $('#department').modal('hide');
                        id_edit_dep = "";
                        name_dep = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
    });

    /**
     * Delete category by id
     */
    $('.btnDeleteDep').click(function () {
        let id_delete_dep = $(this).attr('id');
        console.log(id_delete_dep);
        $('#deleteDepartment #save').click(function () {
            if (id_delete_dep) {
                $.ajax({
                    url: '/departments/delete/' + id_delete_dep,
                    type: 'POST',
                    data: {
                        'id': id_delete_dep
                    },
                    success: function (response) {
                        console.log(response);
                        $('#deleteDepartment').modal('hide');
                        $('.department-' + id_delete_dep).remove();
                        id_delete_dep = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
        $('#deleteDepartment #close').click(function () {
            id_delete_dep = "";
        });
    });

    /**
     * Reset value input
     */
    $('#department #close').click(function () {
        $('#department #name').val(null);
    });
});