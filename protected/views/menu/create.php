<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	Yii::t('app','menu',0)=>array('index'),
	Yii::t('app','create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','menu',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','menu',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','create')." ".Yii::t('app','menu',1); ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>