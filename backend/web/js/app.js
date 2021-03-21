/**
 * Action CURD Categories
 */
$(function () {
    /**
     * Create category
     */
    $('#create').click(function () {
        $('#category #save').click(function () {
            let name = $('#category #name').val();
            // let _csrf = $('#category #_csrf').val();
            if (name) {
                $.ajax({
                    url: '/categories/create',
                    type: 'POST',
                    data: {
                        'name': name,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        let id = response['json']['id'];
                        $('.categories').append('<tr class="category-' + id + '">' +
                            '<th scope="row">' + id + '</th>' +
                            '<td class="cattegoryName-'+id+'">' + name + '</td>' +
                            '<td>0</td>' +
                            '<td>' +
                            '<button type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target="#category" id="' + id + '">Edit</button>' +
                            '<button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#deleteCategory" id="' + id + '">Delete</button>' +
                            '</td>' +
                            '</tr>');
                        $('#category #name').val(null);
                        $('#category').modal('hide');
                        name = "";
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
        let name = $('.cattegoryName-' + id_edit).text();
        console.log(id_edit);
        console.log(name);
        $('#category #name').val(name);
        $('#category #save').click(function () {
            name = $('#category #name').val();
            if (name && id_edit) {
                // let _csrf = $('#category #_csrf').val();
                $.ajax({
                    url: '/categories/update/' + id_edit,
                    type: 'POST',
                    data: {
                        'name': name,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        $('.cattegoryName-' + id_edit).html(name);
                        $('#category #name').val(null);
                        $('#category').modal('hide');
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
     * Delete category by id
     */
    $('.btnDelete').click(function () {
        let id_delete = $(this).attr('id');
        console.log(id_delete);
        $('#deleteCategory #save').click(function () {
            if (id_delete) {
                $.ajax({
                    url: '/categories/delete/' + id_delete,
                    type: 'POST',
                    data: {
                        'id': id_delete
                    },
                    success: function (response) {
                        console.log(response);
                        $('#deleteCategory').modal('hide');
                        $('.category-' + id_delete).remove();
                        id_delete = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
        $('#deleteCategory #close').click(function () {
            id_delete = "";
        });
    });

    /**
     * Reset value input
     */
    $('#category #close').click(function () {
        $('#category #name').val(null);
    });
});