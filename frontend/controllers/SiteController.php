<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\TblModerator;
use frontend\models\TblModeratorSearch;
use frontend\models\TblPermohonan;
use frontend\models\TblPermohonanSearch;

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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single TblModerator model.
     * @param integer $id
     * @return mixed
     */
    public function actionProfile()
    {
        if (\Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        else {
            $role = Yii::$app->user->identity->role_id;
            
            switch($role){
                case '1' :
                    return $this->render('Profileview_moderator');
                break;

                case '2':
                    return $this->render('Profileview_dekan');    // view for super user
                break;

                case '3' :
                    return $this->render('Profileview_cspi');    // view for admin
                break;

                case '4':
                    return $this->render('Profileview_sysOp');    // view for super user
                break;
            }
        }

        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);
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
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        else {
            $role = Yii::$app->user->identity->role_id;
            
            switch($role){
                case '1' :
                    return $this->render('Page_moderator');// view for super user
                break;

                case '2':
                    return $this->render('Page_cspi');// view for super user
                break;

                case '3' :
                    return $this->render('Page_pnc1');    // view for admin
                break;

                case '4' :
                    return $this->render('Page_pnc2');    // view for admin
                break;

                case '5':
                    return $this->redirect('/e-Perolehan/backend/web/index.php');// view for super user
                break;
            }
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {

                    if (\Yii::$app->user->isGuest){
                        return $this->redirect(['site/login']);
                    }
                    else {

                        $this->layout = 'noNav';
                        $role = Yii::$app->user->identity->role_id;
                        
                        switch($role){
                        case '1' :
                            return $this->render('Profile_moderator'); // profile for moderator
                            break;
                        case '2':
                            return $this->render('Profile_dekan'); // profile for dekan
                            break; 
                        case '3' :
                            return $this->render('Profile_cspi'); // profile for cspi
                            break;
                        case '4':
                            return $this->render('Profile_sysOp'); // profile for sysOp
                            break;
                        }
                    }
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
