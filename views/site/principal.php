<?php

use yii\helpers\Html;

$this->title = 'Principal';
?>
<div class="right_col" role="main">

    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#novo"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nova agenda</button>
                    <div class="x_title">    
                        <h2>Agende uma sala<small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<!-- Nova Agenda -->
<div id="novo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Nova agenda</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select onchange="mudaSala()" class="form-control" id="sala">
                                    <option disabled="" selected="">Escolha uma sala</option>
                                    <?php foreach($dataProvider->models as $model): ?>
                                    <option value="<?= $model->id ?>"><?= Html::encode($model->nome) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <p class="text-center">Atenção: O horário ficará em <span class="label label-danger">VERMELHO</span> se a sala já estiver ocupada ou caso você já tenha reservado qualquer sala neste horário.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="calendario"></div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Horários disponíveis</h3>
                        <table style="width: 100%;">
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora7" style="width: 50%; text-align: center; cursor: pointer;">07:00</td>
                                <td onclick="clicaHora(this);" id="hora8" style="width: 50%; text-align: center; cursor: pointer;">08:00</td>
                            </tr>
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora9" style="width: 50%; text-align: center; cursor: pointer;">09:00</td>
                                <td onclick="clicaHora(this);" id="hora10" style="width: 50%; text-align: center; cursor: pointer;">10:00</td>
                            </tr>
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora11" style="width: 50%; text-align: center; cursor: pointer;">11:00</td>
                                <td onclick="clicaHora(this);" id="hora12" style="width: 50%; text-align: center; cursor: pointer;">12:00</td>
                            </tr>
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora13" style="width: 50%; text-align: center; cursor: pointer;">13:00</td>
                                <td onclick="clicaHora(this);" id="hora14" style="width: 50%; text-align: center; cursor: pointer;">14:00</td>
                            </tr>
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora15" style="width: 50%; text-align: center; cursor: pointer;">15:00</td>
                                <td onclick="clicaHora(this);" id="hora16" style="width: 50%; text-align: center; cursor: pointer;">16:00</td>
                            </tr>
                            <tr style="line-height: 30px;">
                                <td onclick="clicaHora(this);" id="hora17" style="width: 50%; text-align: center; cursor: pointer;">17:00</td>
                                <td onclick="clicaHora(this);" id="hora18" style="width: 50%; text-align: center; cursor: pointer;">18:00</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <h3 id="txtHora" style="float: left;"></h3>
                <button id="btnReservar" onclick="reservar()" type="button" class="btn btn-success disabled" disabled="">Reservar Sala!</button>
            </div>
        </div>
    </div>
</div>
<!-- /Nova Agenda -->