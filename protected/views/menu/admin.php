<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	Yii::t('app','menu',0)=>array('index'),
	Yii::t('app','manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','menu',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','menu',1), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','manage')." ".Yii::t('app','menu',0); ?></h1>

<p>
<?php echo Yii::t('app','comparisonSearch'); ?>
</p>

<?php echo CHtml::link(Yii::t('app','advancedSearch'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'posicion',
		'default',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
