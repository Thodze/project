<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card m-2">
    <div class="card-header">
        <h3 class="float-left ">Products</h3>
        <p>
            <button type="button" class="btn btn-success btn-sm float-right" id="create" data-toggle="modal"
                    data-target="#product">Create
            </button>
        </p>
    </div>
    <div class="card-body">
        <?php
        if ($orders):
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Published</th>
                    <th scope="col">Total</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="employees">
                <?php foreach ($orders as $order) :?>
                    <tr class="employee-<?= $order['id']; ?>">
                        <th scope="row"><?= $order['id']; ?></th>
                        <td class="productName-<?= $order['id']; ?>"><?= $order['name']; ?></td>
                        <td class="productPublished-<?= $order['id']; ?>"><?= $order['published']; ?></td>
                        <td class="productPublished-<?= $order['id']; ?>"><?= $order['total']; ?></td>
                        <td class="productTotal-<?= $order['id']; ?>"><?= $order['start_date']; ?></td>
                        <td class="productTotal-<?= $order['id']; ?>"><?= $order['update_date']; ?></td>
                        <td class="productStartDate-<?= $order['id']; ?>"><?= $order['price']; ?></td>
                        <td class="productPrice-<?= $order['id']; ?>"><?= $order['category']; ?></td>
                        <td class="productCategory-<?= $order['id']; ?>"><?= $order['description']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btnEdit" data-toggle="modal"
                                    data-target="#product" id="<?= $order['id']; ?>">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal"
                                    data-target="#deleteProduct" id="<?= $order['id']; ?>">Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info" id="productEmpty" role="alert">
                Orders empty!
            </div>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="product" tabindex="-1" aria-labelledby="productModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModal">Product</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productsForm">
                    <input type="hidden" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="" name="name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label">Published:</label>
                            <select name="published" id="published" class="custom-select">
                                <option selected>Choose...</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="price" value="" name="price">
                        </div>
                        <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label">Total:</label>
                            <input type="text" class="form-control" id="total" value="" name="total">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Department:</label>
                        <select name="id_department" id="id_department" class="custom-select">
                            <option selected>Choose...</option>
                            <?php /*foreach ($categories as $category): */?><!--
                                <option value="<?/*= $category['id']; */?>"><?/*= $category['name']; */?></option>
                            --><?php /*endforeach; */?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="save">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="save">Save</button>
            </div>
        </div>
    </div>
</div>