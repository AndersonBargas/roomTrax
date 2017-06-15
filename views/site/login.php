<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    'fieldConfig' => [
            'template' => "{input}",
    ],
]); ?>

<h1>Login</h1>

<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Usuário']) ?>

<?= $form->field($model, 'senha')->passwordInput(['class' => 'form-control', 'required' => true, 'placeholder' => 'Senha']) ?>

<?php if (Yii::$app->session->hasFlash('erro')): ?>
        <div class="alert alert-danger" style="color: #FFFFFF; text-shadow: none;" role="alert">
            <strong>Oops!</strong> <?= Yii::$app->session->getFlash('erro') ?>
        </div>
        <?php endif; ?>

<?= Html::submitButton('<span class="btn-block-text">Entrar</span>', ['class' => 'btn  btn-default btn-block', 'name' => 'login-button']) ?>
<div class="clearfix"></div>

<div class="separator">
    <p>No primeiro acesso, utilize: <strong>admin@admin.com</strong> / <strong>admin</strong></p>
    <div class="clearfix"></div>
    <br />

    <div>
        <h1><i class="fa fa-hourglass"></i> RoomTrax!</h1>
        <p>©<?= date('Y') ?> <?= Yii::powered() ?></p>
    </div>
</div>

<?php ActiveForm::end(); ?>