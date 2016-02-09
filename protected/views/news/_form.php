<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'post-form',
    'enableAjaxValidation'=>false,
    'action'=>$this->createUrl('publish'),
)); ?>

    <?php echo $form->errorSummary($post); ?>
	<div class="post-input-container">
        <?php echo $form->hiddenField($post,'page_id'); ?>
    	<div class="post-input-message-container">
	        <?php //echo $form->labelEx($post,'message'); ?>
	        <?php echo $form->textField($post,'message',array('size'=>'118','placeholder'=>Yii::t('app','message',1))); ?>
	        <?php echo $form->error($post,'message'); ?>
		</div>
		
		<div class="post-input-shared-container">
			<div class="post-input-image-container">
		        <?php //echo $form->labelEx($post,'picture'); ?>
		        <?php echo $form->textField($post,'picture',array('size'=>'30','placeholder'=>Yii::t('app','picURL',1))); ?>
		        <?php echo $form->error($post,'picture'); ?>
	        </div>
	        <div class="post-input-text-container">
	        	<div class="post-input-name-container">
			        <?php //echo $form->labelEx($post,'name'); ?>
			        <?php echo $form->textField($post,'name',array('size'=>'50','placeholder'=>Yii::t('app','name',1))); ?>
			        <?php echo $form->error($post,'name'); ?>
				</div>
				<div class="post-input-caption-container">
			        <?php //echo $form->labelEx($post,'caption'); ?>
			        <?php echo $form->textField($post,'caption',array('size'=>'50','placeholder'=>Yii::t('app','caption',1))); ?>
			        <?php echo $form->error($post,'caption'); ?>
				</div>
				<div class="post-input-description-container">
			        <?php //echo $form->labelEx($post,'description'); ?>
			        <?php echo $form->textField($post,'description',array('size'=>'50','placeholder'=>Yii::t('app','description',1))); ?>
			        <?php echo $form->error($post,'description'); ?>
				</div>
				<div class="post-input-link-container">
			        <?php //echo $form->labelEx($post,'link'); ?>
			        <?php echo $form->textField($post,'link',array('size'=>'50','placeholder'=>Yii::t('app','link',1))); ?>
			        <?php echo $form->error($post,'link'); ?>
		        </div>
	        </div>
        	<div class="post-input-button-container">	
        		<?php echo CHtml::submitButton(Yii::t('app','publish')); ?>
        	</div>
	        <div class="clear"></div>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->