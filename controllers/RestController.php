<?php

namespace app\controllers;

use Yii;

class RestController extends \yii\web\Controller
{
    public function actionPesquisar($dia, $sala)
    {
        $usuario = Yii::$app->user->identity->id;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $conexao = Yii::$app->getDb();
        $sql = $conexao->createCommand("
                    SELECT
                    IF( HOUR(R.inicio) =  7, 'OCUPADO', 'LIVRE' ) AS  '7',
                    IF( HOUR(R.inicio) =  8, 'OCUPADO', 'LIVRE' ) AS  '8',
                    IF( HOUR(R.inicio) =  9, 'OCUPADO', 'LIVRE' ) AS  '9',
                    IF( HOUR(R.inicio) = 10, 'OCUPADO', 'LIVRE' ) AS '10',
                    IF( HOUR(R.inicio) = 11, 'OCUPADO', 'LIVRE' ) AS '11',
                    IF( HOUR(R.inicio) = 12, 'OCUPADO', 'LIVRE' ) AS '12',
                    IF( HOUR(R.inicio) = 13, 'OCUPADO', 'LIVRE' ) AS '13',
                    IF( HOUR(R.inicio) = 14, 'OCUPADO', 'LIVRE' ) AS '14',
                    IF( HOUR(R.inicio) = 15, 'OCUPADO', 'LIVRE' ) AS '15',
                    IF( HOUR(R.inicio) = 16, 'OCUPADO', 'LIVRE' ) AS '16',
                    IF( HOUR(R.inicio) = 17, 'OCUPADO', 'LIVRE' ) AS '17',
                    IF( HOUR(R.inicio) = 18, 'OCUPADO', 'LIVRE' ) AS '18'
                    FROM reservas AS R
                    WHERE R.sala = :sala
                    AND DATE(R.inicio) = DATE(:dia)
                    UNION ALL
                    SELECT
                    IF( HOUR(R.inicio) =  7, 'OCUPADO', 'LIVRE' ) AS  '7',
                    IF( HOUR(R.inicio) =  8, 'OCUPADO', 'LIVRE' ) AS  '8',
                    IF( HOUR(R.inicio) =  9, 'OCUPADO', 'LIVRE' ) AS  '9',
                    IF( HOUR(R.inicio) = 10, 'OCUPADO', 'LIVRE' ) AS '10',
                    IF( HOUR(R.inicio) = 11, 'OCUPADO', 'LIVRE' ) AS '11',
                    IF( HOUR(R.inicio) = 12, 'OCUPADO', 'LIVRE' ) AS '12',
                    IF( HOUR(R.inicio) = 13, 'OCUPADO', 'LIVRE' ) AS '13',
                    IF( HOUR(R.inicio) = 14, 'OCUPADO', 'LIVRE' ) AS '14',
                    IF( HOUR(R.inicio) = 15, 'OCUPADO', 'LIVRE' ) AS '15',
                    IF( HOUR(R.inicio) = 16, 'OCUPADO', 'LIVRE' ) AS '16',
                    IF( HOUR(R.inicio) = 17, 'OCUPADO', 'LIVRE' ) AS '17',
                    IF( HOUR(R.inicio) = 18, 'OCUPADO', 'LIVRE' ) AS '18'
                    FROM reservas AS R
                    WHERE ( R.sala != :sala AND R.usuario = :usuario )
                    AND DATE(R.inicio) = DATE(:dia)", [':sala' => $sala, ':dia' => $dia, ':usuario' => $usuario]);

        $retorno = $sql->queryAll();
        $r = [];
        if( count($retorno) === 0 ){ // Nenhuma reserva, devolvemos tudo LIVRE
            $r['7'] = 'LIVRE';    $r['8'] = 'LIVRE';    $r['9'] = 'LIVRE';    $r['10']= 'LIVRE';
            $r['11']= 'LIVRE';    $r['12']= 'LIVRE';    $r['13']= 'LIVRE';    $r['14']= 'LIVRE';
            $r['15']= 'LIVRE';    $r['16']= 'LIVRE';    $r['17']= 'LIVRE';    $r['18']= 'LIVRE';
            return $r;
        }

        $r['7'] = 'LIVRE';    $r['8'] = 'LIVRE';    $r['9'] = 'LIVRE';    $r['10']= 'LIVRE';
        $r['11']= 'LIVRE';    $r['12']= 'LIVRE';    $r['13']= 'LIVRE';    $r['14']= 'LIVRE';
        $r['15']= 'LIVRE';    $r['16']= 'LIVRE';    $r['17']= 'LIVRE';    $r['18']= 'LIVRE';
        foreach( $retorno as $ret ){ // Para cada linha
            for( $i = 7; $i <= 18; $i++ ){
                if($ret[$i] === 'OCUPADO'){ $r[$i] = 'OCUPADO'; }
            }
        }
        return $r;
    }

    public function actionAgendar($sala, $inicio, $termino)
    {
        $conexao = Yii::$app->getDb();

        $usuario = Yii::$app->user->identity->id;

        $sql = $conexao->createCommand("
        INSERT INTO reservas(usuario, sala, inicio, termino)
        VALUES (:usuario, :sala, :inicio, :termino)", [ ':usuario' => $usuario, ':sala' => $sala,
                                                        ':inicio' => $inicio,   ':termino' => $termino]);

        $x = $sql->execute();
        if( $x === 1 ){ $sucesso = true; }else{ $sucesso = false; }
        $retorno = [ 'sucesso' => $sucesso ];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $retorno;
    }

}
