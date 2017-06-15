<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $administrador
 * @property string $dataCriacao
 * @property string $dataExclusao
 */
class Usuarios extends ActiveRecord implements IdentityInterface
//class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['dataCriacao', 'dataExclusao'], 'safe'],
            [['nome', 'email', 'senha'], 'string', 'max' => 120],
            [['email'], 'unique'],
            [['administrador'], 'boolean'],
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
            'email' => 'E-mail',
            'senha' => 'Senha',
            'administrador' => 'Administrador',
            'dataCriacao' => 'Data de Criação',
            'dataExclusao' => 'Data Exclusão',
        ];
    }
    
    /**
     * Localiza uma identidade pelo ID informado
     *
     * @param string|int $id o ID a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao ID informado
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    /**
     * Localiza uma identidade pela chave informada
     *
     * @param string $chave a chave a ser localizada
     * @return IdentityInterface|null o objeto da identidade que corresponde a chave informada
     */
    public static function findIdentityByAccessToken($token, $type = NULL)
    {
        return false;
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($email)
    {
        return static::findOne(['email' => $email]);
    }
    
    /**
     * @return int|string o ID do usuário atual
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return false;
    }
    
    /**
     * @param string $chave
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($chave)
    {
        return false;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($senha)
    {
        return $this->senha === $senha;
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if( isset($this->senha) && !empty($this->senha) ){
                $this->senha = Yii::$app->getSecurity()->generatePasswordHash($this->senha);
            }
            if( $this->isNewRecord ){
                $this->dataCriacao = new Expression('NOW()');
            }
            return true;
        }
        return false;
    }
}
