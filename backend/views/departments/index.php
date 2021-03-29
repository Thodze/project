<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card m-2">
    <div class="card-header">
        <h3 class="float-left ">Departments</h3>
        <p>
            <button type="button" class="btn btn-success btn-sm float-right" id="createDep" data-toggle="modal"
                    data-target="#department">Create
            </button>
        </p>
    </div>
    <div class="card-body">
        <?php
        if ($departments):
        ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Products</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="departments">
            <?php foreach ($departments as $department) :?>
            <tr class="department-<?= $department['id']; ?>">
                <th scope="row"><?= $department['id']; ?></th>
                <td class="departmentName-<?= $department['id']; ?>"><?= $department['name']; ?></td>
                <td>5</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btnEditDep" data-toggle="modal"
                            data-target="#department" id="<?= $department['id']; ?>">Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btnDeleteDep" data-toggle="modal"
                            data-target="#deleteDepartment" id="<?= $department['id']; ?>">Delete
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-info" id="departmentEmpty" role="alert">
            Departments empty!
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="department" tabindex="-1" aria-labelledby="departmentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModal">Department</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="departmentsForm">
                    <input type="hidden" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="" name="name">
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

<div class="modal fade" id="deleteDepartment" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Department</h5>
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