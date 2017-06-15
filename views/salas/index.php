<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Salas <small>Utilize esta página para gerenciar as salas</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p><?= Html::a('Nova sala', ['create'], ['class' => 'btn btn-success']) ?></p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nome',
                        'lotacao',
                        'projetor:boolean',
                        'som:boolean',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-hover'],
                ]); ?>
            </div>
        </div>
    </div>
</div>
