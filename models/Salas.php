<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property string $id
 * @property string $nome
 * @property integer $lotacao
 * @property boolean $projetor
 * @property boolean $som
 */
class Salas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'lotacao'], 'required'],
            [['lotacao'], 'integer'],
            [['projetor', 'som'], 'boolean'],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'lotacao' => 'Lotação',
            'projetor' => 'Projetor',
            'som' => 'Som',
        ];
    }
}
