<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */

$this->breadcrumbs=array(
	Yii::t('app','quote',0)=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','quote',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','quote',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','update')." ". Yii::t('app','quote',1), 'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','delete')." ". Yii::t('app','quote',1), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','sureDelete'))),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','quote',0), 'url'=>array('admin')),	
	
);
?>

<h1><?php echo Yii::t('app','view')." ".Yii::t('app','quote',1)." ".$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'fecha_hora',
		'cotizacion_anterior_id',
		'estado_cotizacion_id',
		'cliente_id',
		'contacto_id',
		'linea_negocio_id',
		'vigencia',
		'plazo',
		'valor_total',
	),
)); ?>
<br/>
<h2><?php echo Yii::t('app',$model->getAttributeLabel('requerimiento')); ?></h2>
<?php echo $model->requerimiento;?>
<h2><?php echo Yii::t('app',$model->getAttributeLabel('contenido')); ?></h2>
<?php echo $model->contenido;?>
