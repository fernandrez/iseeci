<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('app','menu',0)
);

$this->menu=array(
	array('label'=>Yii::t('app','create')." ". Yii::t('app','menu',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','menu',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','menu',0); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'ajaxUpdate'=>true,
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
