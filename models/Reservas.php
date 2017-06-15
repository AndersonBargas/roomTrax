<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property string $id
 * @property string $usuario
 * @property string $sala
 * @property string $observacao
 * @property string $inicio
 * @property string $termino
 */
class Reservas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'sala', 'observacao', 'inicio', 'termino'], 'required'],
            [['usuario', 'sala'], 'integer'],
            [['observacao'], 'string'],
            [['inicio', 'termino'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuário',
            'sala' => 'Sala',
            'observacao' => 'Observação',
            'inicio' => 'Início',
            'termino' => 'Término',
        ];
    }
}
