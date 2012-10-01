<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('statistika-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'statistika-grid',
    'dataProvider' => $model->search(),
    'cssFile' => Yii::app()->baseUrl . '/css/gried/gried.css',
    'filter' => $model,
    'columns' => array(
        'ip',
        'host',
        'counter',
        'last',
    ),
));
?>
