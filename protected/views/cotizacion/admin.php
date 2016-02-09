<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */

$this->breadcrumbs=array(
	Yii::t('app','quote',0)=>array('index'),
	Yii::t('app','manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','quote',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','quote',1), 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cotizacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','manage')." ".Yii::t('app','quote',0); ?></h1>

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
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fecha_hora',
		'plazo',
		'cliente_id',
		//'contenido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
