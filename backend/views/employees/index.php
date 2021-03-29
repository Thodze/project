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
        <h3 class="float-left ">Employees</h3>
        <p>
            <button type="button" class="btn btn-success btn-sm float-right" id="create" data-toggle="modal"
                    data-target="#employee">Create
            </button>
        </p>
    </div>
    <div class="card-body">
        <?php
        if ($employees):
        ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Mail</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="employees">
            <?php foreach ($employees as $employee) :?>
            <tr class="employee-<?= $employee['id']; ?>">
                <th scope="row"><?= $employee['id']; ?></th>
                <td class="employeeName-<?= $employee['id']; ?>"><?= $employee['name']; ?></td>
                <td class="employeeGender-<?= $employee['id']; ?>"><?= $employee['gender'] ? "Male" : "Female" ?></td>
                <td class="employeeDateOfBirth-<?= $employee['id']; ?>"><?= $employee['date_of_birth']; ?></td>
                <td class="employeeAddress-<?= $employee['id']; ?>"><?= $employee['address']; ?></td>
                <td class="employeePhone-<?= $employee['id']; ?>"><?= $employee['phone']; ?></td>
                <td class="employeeMail-<?= $employee['id']; ?>"><?= $employee['mail']; ?></td>
                <td class="employeeIdDepartment-<?= $employee['id']; ?>">
                    <?php foreach ($departments as $department): ?>
                        <?php if ($department['id'] == $employee['id_department']): ?>
                            <span id="<?= $department['id']; ?>"><?= $department['name']; ?></span>
                        <?php endif; ?>
                    <?php endforeach;?>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btnEditEmp" data-toggle="modal"
                            data-target="#employee" id="<?= $employee['id']; ?>">Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btnDeleteEmp" data-toggle="modal"
                            data-target="#deleteEmployee" id="<?= $employee['id']; ?>">Delete
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-info" id="employeeEmpty" role="alert">
            Employees empty!
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="employee" tabindex="-1" aria-labelledby="employeeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModal">Category</h5>
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="employeesForm">
                    <input type="hidden" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="" name="name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label for="recipient-name" class="col-form-label">Gender:</label>
                            <select name="gender" id="gender" class="custom-select">
                                <option selected>Choose...</option>
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                        <div class="form-group col-9">
                            <label for="recipient-name" class="col-form-label">Department:</label>
                            <select name="id_department" id="id_department" class="custom-select">
                                <option selected>Choose...</option>
                                <?php foreach ($departments as $department): ?>
                                <option value="<?= $department['id']; ?>"><?= $department['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label">Phone:</label>
                            <input type="text" class="form-control" id="phone" value="" name="phone">
                        </div>
                        <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label">Mail:</label>
                            <input type="email" class="form-control" id="mail" value="" name="mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Date of birth:</label>
                        <input type="text" class="form-control" id="date_of_birth" value="" name="date_of_birth">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="address" value="" name="address">
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

<div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Employee</h5>
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