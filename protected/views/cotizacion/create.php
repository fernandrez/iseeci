<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */

$this->breadcrumbs=array(
	Yii::t('app','quote',0)=>array('index'),
	Yii::t('app','create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','quote',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','quote',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','create')." ".Yii::t('app','quote',1); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>