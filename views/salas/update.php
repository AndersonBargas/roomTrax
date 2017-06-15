<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salas */

$this->title = 'Editar sala: ' . $model->nome;
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editando: <?= Html::encode($model->nome) ?> <small>altere os dados usando o formulário abaixo</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>