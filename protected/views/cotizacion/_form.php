<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cotizacion_anterior_id'); ?>
		<?php echo $form->dropDownList($model,'cotizacion_anterior_id',CHtml::listData(Cotizacion::model()->findAll(array('order'=>'id')),'id','id')); ?>
		<?php echo $form->error($model,'cotizacion_anterior_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_cotizacion_id'); ?>
		<?php echo $form->dropDownList($model,'estado_cotizacion_id',CHtml::listData(EstadoCotizacion::model()->findAll(array('order'=>'titulo')),'id','tituloT')) ?>
		<?php echo $form->error($model,'estado_cotizacion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente_id'); ?>
		<?php echo $form->dropDownList($model,'cliente_id',CHtml::listData(User::model()->findAll(array('order'=>'username')),'id','username')); ?>
		<?php echo $form->error($model,'cliente_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contacto_id'); ?>
		<?php echo $form->dropDownList($model,'contacto_id',CHtml::listData(Contacto::model()->findAll(array('order'=>'id')),'id','email')); ?>
		<?php echo $form->error($model,'contacto_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linea_negocio_id'); ?>
		<?php echo $form->dropDownList($model,'linea_negocio_id',CHtml::listData(LineaNegocio::model()->findAll(array('order'=>'titulo')),'id','tituloT')); ?>
		<?php echo $form->error($model,'linea_negocio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requerimiento'); ?>
		<?php echo $form->textArea($model,'requerimiento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'requerimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenido'); ?>
		<?php echo $form->textArea($model,'contenido',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contenido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vigencia'); ?>
		<?php echo $form->textField($model,'vigencia',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'vigencia'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'plazo'); ?>
		<?php echo $form->textField($model,'plazo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_total'); ?>
		<?php echo $form->textField($model,'valor_total'); ?>
		<?php echo $form->error($model,'valor_total'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app',$model->isNewRecord ? 'create' : 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->