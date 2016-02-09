<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
	$this->pageTitle=Yii::t('iseeci',$p->titulo,1).' | '.Yii::app()->name;
?>

<h1 style="text-align: center;"><?php echo Yii::t('iseeci',$p->tituloT,1);?></h1>
<!--<h2 style="text-align: center;"><?php echo Yii::t('iseeci',$p->subtituloT,1);?></h2>-->
<?php 
if(count($dataProvider->getData())==0): ?>
<h3 style="text-align: center;"><?php echo Yii::t('iseeci',$p->descripcionT,1);?></h3>
<?php endif; ?>

<div  class="row-fluid">
<?php 
if(count($dataProvider->getData())>0){
$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>$p->vista,
	'template'=>'{items}{pager}'
));
} ?>
</div>