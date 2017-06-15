<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Usuários <small>Utilize esta página para gerenciar os usuários</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p><?= Html::a('Novo usuário', ['novo'], ['class' => 'btn btn-success']) ?></p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nome',
                        'email:email',
                        'administrador:boolean',
                        'dataCriacao:datetime',

                        ['class' => 'yii\grid\ActionColumn',
                        'template' => '{usuarioEditar} {usuarioExcluir}',
                        'buttons'  => [
                                        'usuarioEditar' => function ($url, $model) {
                                            $url = Url::to(['usuarios/editar', 'id' => $model->id]);
                                            return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'Editar']);
                                        },
                                        'usuarioExcluir' => function ($url, $model) {
                                            $url = Url::to(['usuarios/excluir', 'id' => $model->id]);
                                            return Html::a('<span class="fa fa-trash"></span>', $url, [
                                                'title'        => 'Excluir',
                                                'data-confirm' => 'Tem certeza que deseja excluir este usuário?',
                                                'data-method'  => 'post',
                                            ]);
                                        },
                                    ],
                        ],
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-hover'],
                ]); ?>
            </div>
        </div>
    </div>
</div>