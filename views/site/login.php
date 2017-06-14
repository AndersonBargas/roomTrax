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
    'fieldConfig' => [
            'template' => "{input}",
    ],
]); ?>

<h1>Login</h1>

<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Usuário']) ?>

<?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'required' => true, 'placeholder' => 'Senha']) ?>

<div class="clearfix"></div>

<div class="separator">

    <div class="clearfix"></div>
    <br />

    <div>
        <h1><i class="fa fa-hourglass"></i> RoomTrax!</h1>
        <p>©<?= date('Y') ?> <?= Yii::powered() ?></p>
    </div>
</div>

<?php ActiveForm::end(); ?>

    