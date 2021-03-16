<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Register';
?>

<div class="row">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['class' => 'user']
            ]) ?>
            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter Username...'
                ]
            ])->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter Email...'
                ]
            ])->textInput() ?>
            <?= $form->field($model, 'password', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Password'
                ]
            ])->passwordInput() ?>
            <?= Html::submitButton('Register Account', [
                'class' => 'btn btn-primary btn-user btn-block',
                'name' => 'register-button'
            ]) ?>
            <?php ActiveForm::end() ?>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
