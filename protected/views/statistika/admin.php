<input id="deleteAll" type="button" name="delAll" value="Удалить все записи" class="btn-danger" />
<br />
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript(
        'deleteAll', '    $("#deleteAll").click(
    function() {
        var url = "/statistika/deleteAll";
        $.get(url, function(response) {
            window.location.href = "";
        });
        return false;
    });', CClientScript::POS_END);
// Удаляем все 

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
// поиск по таблице

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
// Виджет таблицы
?>
