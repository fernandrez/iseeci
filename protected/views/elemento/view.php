<?php
/* @var $this ElementoController */
/* @var $model Elemento */

$this->breadcrumbs=array(
	'elemento'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','elemento',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','elemento',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','update')." ". Yii::t('app','elemento',1), 'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','delete')." ". Yii::t('app','elemento',1), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','sureDelete'))),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','elemento',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','view')." ".Yii::t('app','elemento',1).' # '. $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo_elemento_id',
		'parent_id',
		'dir_imagen',
		'titulo',
		'subtitulo',
		'descripcion',
		'posicion',
		'default',
		'con_link',
	),
)); ?>
