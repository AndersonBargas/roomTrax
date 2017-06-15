<?php

namespace app\controllers;

use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Historico;
use app\models\LoginForm;
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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
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
        //$this->layout = "login";
        return $this->render('principal', [
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $this->historico('Usuário se deslogou do sistema.');
        Yii::$app->user->logout();
        return $this->goHome();
    }


    /**
     * Exibe o histórico
     *
     * @return null
     */
    public function actionHistorico(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if( !Yii::$app->request->isAjax ){
            $this->layout = 'principal';
            return $this->render('historico', []);
        }


        $post = Yii::$app->request->post();

        $draw = $post['draw'];
        $start = $post['start'];
        $search = $post['search']['value'];
        $length = $post['length'];

        $query = new Query;
        $query->select('H.id , U.nome , H.comentario , H.dataHistorico, H.ip, H.host, H.navegador, H.url, H.detalhes')
		->from('historico AS H')
		->join(	'INNER JOIN',
				'usuarios AS U',
				'U.id = H.idUsuario'
		);
        
        if( !empty($search) ){
            $query->filterWhere(['=', 'H.id', $search])
            ->orFilterWhere(['like', 'U.nome', $search])
            ->orFilterWhere(['like', 'H.comentario', $search]);
        }
        
        $query->orderBy([ 'id' => SORT_DESC ])
        ->offset($start)
        ->limit($length);
        $command = $query->createCommand();
        $linhas = $command->queryAll();

        $total = Historico::find()->count();

        $data = [];

        foreach( $linhas as $l ){
            $loop = [];
            $loop[] = $l['id'];
            $loop[] = $l['nome'];
            $loop[] = $l['comentario'];
            $loop[] = $l['dataHistorico'];
            $loop[] = 'Abrir';
            $loop[] = $l['ip'];
            $loop[] = $l['host'];
            $loop[] = $l['navegador'];
            $loop[] = $l['url'];
            $loop[] = base64_encode($l['detalhes']);
            
            $data[] = $loop;
        }        
        
        $retorno = [
            "draw" => $draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $data
        ];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $retorno;

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
    
    public function isJSON($string)
    {
        return is_string($string) && is_object(json_decode($string)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    
    function isLocal($ip, $range)
    {
    	if( strpos( $range, '/' ) == false ) {
    		$range .= '/32';
    	}
    	// $range segue o formato IP/CIDR, exemplo 127.0.0.1/24
    	list( $range, $netmask ) = explode( '/', $range, 2 );
    	$range_decimal = ip2long( $range );
    	$ip_decimal = ip2long( $ip );
    	$wildcard_decimal = pow( 2, ( 32 - $netmask ) ) - 1;
    	$netmask_decimal = ~ $wildcard_decimal;
    	return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
    }



}
