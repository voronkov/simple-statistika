<?php

class Statistika extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'statistika';
    }

    public function rules() {

        return array(
            array('ip, host, last', 'required'),
            array('counter', 'numerical', 'integerOnly' => true),
            array('id, ip, host, counter, last', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {

        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ip' => 'IP адрес',
            'host' => 'Url адрес',
            'counter' => 'Колличество посещений',
            'last' => 'Дата последнего посещения',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('host', $this->host, true);
        $criteria->compare('counter', $this->counter);
        $criteria->compare('last', $this->last, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}