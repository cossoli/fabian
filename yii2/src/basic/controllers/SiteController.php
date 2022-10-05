<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\frmvalidar;
use app\models\TblUsuario;
use app\models\usuarios;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        return $this->render('index');
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
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

 /**
     * Displays aboutprueba page.
     *
     * @return string
     */
    public function actionPrueba($dato = 'sin valor pasado....')

    {
        $varname = 'dato de la variable';
        $varvalor = 54;
        $vararray =[1,2,3,4,5];

        return $this->render('prueba', ['varname'=> $varname, 
                                       'varvalor' => $varvalor,
                                        'vararray' => $vararray,
                                        'dato' => $dato]                     
                              );
    }
    public function actionForm($mensaje=null)
    {
        return $this->render ('form', ["mensaje" => $mensaje]); 
    } 

    public function actionSform()
    {
       $datotxt=null;
       if (isset($_REQUEST['campotxt']))
       {
        $datotxt = "El valor de dato enviado ".$_REQUEST ['campotxt'];
       }
       

        return $this->redirect(['site/form',"mensaje"=> $datotxt]);
    } 

    public function actionFrmvalidar()
    {
        $model = new frmvalidar;
        $mensaje = null;

        if ($model-> load(Yii::$app->request->post()))
        {
          if ($model->validate( )
          )
            {
          // consulta , calculos
             $tbl = new TblUsuario;
             
             $tbl->nombre =$model->nombre;
             $tbl->email =$model->email;
             
             if ($tbl->insert())
             {
                 $mensaje =" El usuario fue guardado";
               
                 $mensaje->nombre=null;
                 $mensaje->email=null;

             }
          $mensaje = 'A ocurrido un error en insertar';

             }
            else
            {
              $model->getErrors();
            }
   

    }
     return $this->render('frmvalidar', ['model'=>$model, 'mensaje'=>$mensaje]);
}


public function actionUsuarios($mensaje=null)
{
     $data = TblUsuario::find()-> all();

    return $this->render('usuarios',["mensaje"=>$mensaje,'data'=>$data ]);
}


public function actionDelUsuarios($id=null)
{
     $usr = TblUsuario::findOne($id);
     $usr_delete();

    return $this->redirect(['site/usuarios',"mensaje"=>$mensaje ]);
}
}
