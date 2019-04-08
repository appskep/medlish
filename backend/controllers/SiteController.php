<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\PasswordForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /* 'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ], */
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($bulan = '', $tahun = '')
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        
        if ($tahun == '' || $tahun > date('Y')) $tahun = date('Y');
        if ($bulan == '' || $bulan > date('m')) $bulan = date('m');

        return $this->render('index', [
            'tahun' => $tahun,
            'bulan' => $bulan,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*
     * Change Password
     */
    public function actionChangePassword(){
        $model      = new PasswordForm;
        $modeluser  = User::findOne(Yii::$app->user->id);
     
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $password = $_POST['PasswordForm']['newpass'];
                    $modeluser->setPassword($password);
                    $modeluser->generateAuthKey();

                    if($modeluser->save(false)){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed.'
                        );
                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed.'
                        );
                        return $this->render('changepassword',['model'=>$model]);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',['model'=>$model]);
                }
            }else{
                return $this->render('changepassword',['model'=>$model]);
            }
        }else{
            return $this->render('changepassword',['model'=>$model]);
        }
    }
}
