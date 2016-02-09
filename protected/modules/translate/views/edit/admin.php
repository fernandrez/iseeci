<h1><?php echo TranslateModule::t('Manage Messages')?></h1>

<?php 
$source=MessageSource::model()->findAll();
//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('zii.widgets.grid.CGridView', array(	
	'id'=>'rutina-diaria-operador-grid',
	'dataProvider'=>$model->search(),
	//'type'=>'striped bordered condensed',
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'id',
            'filter'=>CHtml::listData($source,'id','id'),
        ),
        array(
            'name'=>'message',
        ),
        array(
            'name'=>'category',
            'filter'=>CHtml::listData($source,'category','category'),
        ),
        array(
            'name'=>'language',
            'filter'=>CHtml::listData($model->findAll(new CDbCriteria(array('group'=>'language'))),'language','language')
        ),
        'translation',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'updateButtonUrl'=>'Yii::app()->getController()->createUrl("update",array("id"=>$data->id,"language"=>$data->language))',
            'deleteButtonUrl'=>'Yii::app()->getController()->createUrl("delete",array("id"=>$data->id,"language"=>$data->language))',
        )
	),
)); ?>
