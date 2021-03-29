/**
 * Action CURD Categories
 */
$(function () {
    /**
     * Create category
     */
    $('#createCategory').click(function () {
        $('#categoryModal').html('Create Category');
        $('#category #save').click(function () {
            let categoryName = $('#category #name').val();
            // let _csrf = $('#category #_csrf').val();
            if (categoryName != null) {
                $.ajax({
                    url: '/categories/create',
                    type: 'POST',
                    data: {
                        'name': categoryName,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        // let data = JSON.parse(response);
                        console.log(response.json);
                        let id_cat = response.json.id;
                        let name_cat = response.json.name;
                        if (id_cat) {
                            let newContent = '<tr class="category-' + id_cat + '">' +
                                '<th scope="row">' + id_cat + '</th>' +
                                '<td class="categoryName-'+id_cat+'">' + name_cat + '</td>' +
                                '<td>0</td>' +
                                '<td>' +
                                '<button type="button" class="btn btn-primary btn-sm btnEditCat" data-toggle="modal" data-target="#category" id="' + id_cat + '">Edit</button>' +
                                '<button type="button" class="btn btn-danger btn-sm btnDeleteCat" data-toggle="modal" data-target="#deleteCategory" id="' + id_cat + '">Delete</button>' +
                                '</td>' +
                                '</tr>';
                            $('.categories').append(newContent);
                            /*$('.categories').append('<tr class="category-' + id_cat + '">' +
                                '<th scope="row">' + id_cat + '</th>' +
                                '<td class="categoryName-'+id_cat+'">' + categoryName + '</td>' +
                                '<td>0</td>' +
                                '<td>' +
                                '<button type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal" data-target="#category" id="' + id_cat + '">Edit</button>' +
                                '<button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#deleteCategory" id="' + id_cat + '">Delete</button>' +
                                '</td>' +
                                '</tr>');*/
                        }
                        categoryName = "";
                        $('#category #name').val(null);
                        $('#category').modal('hide');
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
    });

    $('.btnEditCat').click(function () {
        let id_edit_cat = $(this).attr('id');
        let nameCat = $('.cattegoryName-' + id_edit_cat).text();
        $('#categoryModal').html('Edit Category');
        $('#category #name').val(nameCat);
        $('#category #save').click(function () {
            nameCat = $('#category #name').val();
            if (id_edit_cat && nameCat) {
                // let _csrf = $('#category #_csrf').val();
                $.ajax({
                    url: '/categories/update/' + id_edit_cat,
                    type: 'POST',
                    data: {
                        'name': nameCat,
                        // '_csrf': _csrf
                    },
                    success: function (response) {
                        console.log(response);
                        $('.cattegoryName-' + id_edit_cat).html(nameCat);
                        $('#category #name').val(null);
                        $('#category').modal('hide');
                        id_edit_cat = "";
                        nameCat = "";
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
    $('.btnDeleteCat').click(function () {
        let id_delete_cat = $(this).attr('id');
        $('#deleteCategory #save').click(function () {
            if (id_delete_cat) {
                $.ajax({
                    url: '/categories/delete/' + id_delete_cat,
                    type: 'POST',
                    data: {
                        'id': id_delete_cat
                    },
                    success: function (response) {
                        console.log(response);
                        $('#deleteCategory').modal('hide');
                        $('.category-' + id_delete_cat).remove();
                        id_delete_cat = "";
                    },
                    error: function (exception) {
                        console.log(exception);
                    }
                });
            }
        });
        $('#deleteCategory #close').click(function () {
            id_delete_cat = "";
        });
    });

    /**
     * Reset value input
     */
    $('#category #close').click(function () {
        $('#category #name').val(null);
    });
});