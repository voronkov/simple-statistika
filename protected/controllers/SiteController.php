<?php

class SiteController extends Controller {

    public $layout = '//layouts/main';

    public function actions() {
        return array();
    }

    public function actionIndex() { // переадревуем на котроллер на всякий случай, хотя выставлен в настройках контроллер по умолчанию
        $this->redirect(Yii::app()->baseUrl . '/statistika');
    }

    public function actionError() { // выкидываем страницу с кодом ошибки, при ошибке
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionLogin() { // очевидно из названия
        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() { // очевидно из названия
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}