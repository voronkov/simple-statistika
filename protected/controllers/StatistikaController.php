<?php

class StatistikaController extends Controller {

    public $layout = '//layouts/main';

    public function filters() {
        return array(
            'accessControl',
            'postOnly + delete',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('getUrl'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('admin'),
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new Statistika('search');
        $model->unsetAttributes();
        if (isset($_GET['Statistika']))
            $model->attributes = $_GET['Statistika'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Statistika::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actiongetUrl($url) {
        $url = CHtml::encode($url);
        $array_url = explode('/', $url);
        $urlnew = 'http://' . $array_url[2];
        $ip = CHttpRequest::getUserHostAddress();
        $criteria = new CDbCriteria();
        $criteria->condition = 'ip=:ip';
        $criteria->params = array(':ip' => $ip);
        $criteria->compare('host', $urlnew);
        $criteria->compare('last', date('d.m.Y'));
        $proverka = Statistika::model()->find($criteria);
        if ($proverka !== NULL) {
            
        } else {
            $criteria1 = new CDbCriteria();
            $criteria1->compare('host', $urlnew);
            $criteria1->compare('last', date('d.m.Y'));
            $proverka2 = Statistika::model()->find($criteria1);
            if ($proverka2 !== NULL) {
                $model = Statistika::model()->findByPk($proverka2['id']);
                $model->counter = $proverka2['counter'] + 1;
                $model->save();
            } else {
                $model = new Statistika();
                $model->ip = $ip;
                $model->host = $urlnew;
                $model->counter = 1;
                $model->last = date('d.m.Y');
                $model->save();
            }
        }
    }

}
