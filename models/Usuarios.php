<?php

namespace app\models;

//use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $chave
 * @property string $dataCriacao
 * @property string $dataAtualizacao
 * @property string $dataConfirmacao
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
            [['dataCriacao', 'dataAtualizacao', 'dataConfirmacao', 'dataExclusao'], 'safe'],
            [['nome', 'email', 'senha', 'chave'], 'string', 'max' => 120],
            [['email'], 'unique'],
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
            'email' => 'Email',
            'senha' => 'Senha',
            'chave' => 'Chave',
            'dataCriacao' => 'Data Criacao',
            'dataAtualizacao' => 'Data Atualização',
            'dataConfirmacao' => 'Data Confirmação',
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
        return static::findOne(['chave' => $token]);
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
        return $this->chave;
    }
    
    /**
     * @param string $chave
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($chave)
    {
        return $this->getAuthKey() === $chave;
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
    
    /*public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            //if ($this->isNewRecord) {
                $this->chave = \Yii::$app->security->generateRandomString();
            //}
            return true;
        }
        return false;
    }*/
}
