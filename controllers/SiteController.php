<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Historico;
use app\models\LoginForm;
use app\models\Salas;
use app\models\Usuarios;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['sair'],
                'rules' => [
                    [
                        'actions' => ['sair'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'sair' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        return $this->redirect(['principal']);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if( $model->login() ){
                $this->historico('Usuário se logou no sistema.', false);
                return $this->goBack();
            }else{
                Yii::$app->getSession()->setFlash('erro','E-mail ou senha incorreto(s).');
            }
        }

        $this->layout = "login";
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Principal action.
     *
     * @return Response|string
     */
    public function actionPrincipal()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Salas::find(),
        ]); 
        return $this->render('principal', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionSair()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->historico('Usuário se deslogou do sistema.');
        Yii::$app->user->logout();
        return $this->goHome();
    }



    /**
     * Salva coisas no histórico.
     *
     * @return null
     */
    public function historico($comentario, $salvaDetalhes = true)
    {
        if (Yii::$app->user->isGuest) {
            return null;
        }
        $h = new Historico();
        $h->idUsuario = Yii::$app->user->getId();
        $h->dataHistorico = new Expression('NOW()');
        $h->ip = Yii::$app->request->getUserIP();
        $h->host = gethostbyaddr($h->ip);
        $h->navegador = Yii::$app->request->getUserAgent();
        $h->comentario = $comentario;
        $h->url = Yii::$app->request->absoluteUrl;
        $post = Yii::$app->request->post();
        if($salvaDetalhes){
            if (Yii::$app->request->isPost) {
                if(Yii::$app->request->isAjax){
                    $h->detalhes = $post;
                }else{
                    $h->detalhes = json_encode($post);
                }
            }    
        }
        $h->save(false);
    }

}
