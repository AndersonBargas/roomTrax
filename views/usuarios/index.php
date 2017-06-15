<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Usuários <small>Utilize esta página para gerenciar os usuários</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p><?= Html::a('Novo usuário', ['create'], ['class' => 'btn btn-success']) ?></p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nome',
                        'email:email',
                        'dataCriacao:datetime',
                        // 'dataAtualizacao',
                        // 'dataConfirmacao',
                        // 'dataExclusao',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-hover'],
                ]); ?>
            </div>
        </div>
    </div>
</div>