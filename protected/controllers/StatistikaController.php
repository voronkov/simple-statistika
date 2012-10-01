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
                'actions' => array('index', 'deleteAll'),
                'users' => array('admin'),
            ),
            array('allow',
                'actions' => array('index', 'deleteAll'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() { // главная с таблицей записей
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

    public function actiongetUrl($url) { // принимаем урл
        $url = CHtml::encode($url);
        $array_url = explode('/', $url);
        if (isset($array_url[2])) {
            $urlnew = 'http://' . $array_url[2];
            $criteria = new CDbCriteria();
            $criteria->condition = 'ip=:ip';
            $criteria->params = array(':ip' => CHttpRequest::getUserHostAddress());
            $criteria->compare('host', $urlnew);
            $criteria->compare('last', date('d.m.Y'));
            $proverka = Statistika::model()->find($criteria);
            if ($proverka == NULL) {
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
                    $model->ip = CHttpRequest::getUserHostAddress();
                    $model->host = $urlnew;
                    $model->counter = 1;
                    $model->last = date('d.m.Y');
                    $model->save();
                }
            }
        }
    }

    public function actiondeleteAll() { // удаляем все записи
        $model = new Statistika();
        $model->deleteAll();
    }

}
